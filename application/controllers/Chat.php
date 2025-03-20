<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Assign a guest session if not set
    private function get_guest_id()
    {
        if (!$this->session->userdata('guest_id')) {
            $this->session->set_userdata('guest_id', uniqid('guest_'));
        }
        return $this->session->userdata('guest_id');
    }


    // Store a new chat message
    public function send_message()
    {
        $guest_id = $this->get_guest_id();
        $new_message = $this->input->post('message', true);
        $sender_type = $this->input->post('sender_type', true); // 'guest' or 'admin'

        if (empty($new_message) || empty($sender_type)) {
            echo json_encode(["error" => "Invalid message format"]);
            return;
        }

        // Check if chat exists
        $chat = $this->db->where('guest_id', $guest_id)->get('chat_messages')->row();

        if ($chat) {
            $existing_messages = json_decode($chat->message, true);
            if (!is_array($existing_messages)) {
                $existing_messages = [];
            }

            // Append new message
            $existing_messages[] = [
                "message" => $new_message,
                "sender" => $sender_type,
                "timestamp" => time(),
            ];

            $this->db->where('guest_id', $guest_id)
                ->update('chat_messages', ['message' => json_encode($existing_messages), 'status' => 'unread']);
        } else {
            // Insert a new chat row
            $this->db->insert('chat_messages', [
                'guest_id'    => $guest_id,
                'message'     => json_encode([
                    [
                        "message" => $new_message,
                        "sender" => $sender_type,
                        "timestamp" => time(),
                        "status" => 'unread'
                    ]
                ]),
                'created_at'  => date('Y-m-d H:i:s'),
                "status" => 'unread'

            ]);
        }

        echo json_encode(["success" => true]);
    }






    public function get_active_guests()
    {
        $this->db->distinct();
        $this->db->select('guest_id');
        $this->db->where('sender_type', 'guest');
        $query = $this->db->get('chat_messages');
        echo json_encode($query->result());
    }

    // public function get_messages_by_guest()
    // {
    //     $guest_id = $this->input->get('guest_id');
    //     if (!$guest_id) return;

    //     $this->db->where('guest_id', $guest_id);
    //     $this->db->order_by('create d_at', 'ASC');
    //     $query = $this->db->get('chat_messages');
    //     echo json_encode($query->result());
    // }

    public function get_messages_by_guest()
    {
        $guest_id = $this->input->get('guest_id');

        $chat_entry = $this->db->where("guest_id", $guest_id)->get("chat_messages")->row();

        if ($chat_entry) {
            echo json_encode(json_decode($chat_entry->message, true));
        } else {
            echo json_encode([]); // No messages found
        }
    }





    // public function admin_reply()
    // {
    //     $guest_id = $this->input->post('guest_id');
    //     $message = $this->input->post('message', true);

    //     if (!empty($message) && !empty($guest_id)) {
    //         $this->db->insert('chat_messages', [
    //             'guest_id'    => $guest_id,
    //             'message'     => $message,
    //             'sender_type' => 'admin'
    //         ]);
    //     }
    // }

    public function admin_reply()
    {
        $guest_id = $this->input->post('guest_id', true);
        $message = $this->input->post('message', true);

        if (empty($guest_id) || empty($message)) {
            echo json_encode(["error" => "Invalid guest or message"]);
            return;
        }

        // Fetch existing chat messages
        $chat = $this->db->where('guest_id', $guest_id)->get('chat_messages')->row();

        if ($chat) {
            $existing_messages = json_decode($chat->message, true);
            if (!is_array($existing_messages)) {
                $existing_messages = [];
            }
            $existing_messages[] = [
                "message" => $message,
                "sender" => "admin",
                "timestamp" => time()
            ];

            $this->db->where('guest_id', $guest_id)
                ->update('chat_messages', ['message' => json_encode($existing_messages)]);
        } else {
            $this->db->insert('chat_messages', [
                'guest_id'    => $guest_id,
                'message'     => json_encode([
                    [
                        "message" => $message,
                        "sender" => "admin",
                        "timestamp" => time()
                    ]
                ]),
                'created_at'  => date('Y-m-d H:i:s')
            ]);
        }

        echo json_encode(["success" => true]);
    }



    public function get_latest_message()
    {
        $this->db->order_by('id', 'DESC'); // ❌ Newest message first
        $this->db->limit(1);
        $query = $this->db->get('chat_messages');
        echo json_encode($query->row());
    }


    public function get_unread_counts()
    {
        $this->db->select('guest_id, COUNT(*) as unread_count');
        $this->db->where('status', 'unread');
        $this->db->group_by('guest_id');
        $query = $this->db->get('chat_messages');
        echo json_encode($query->result());
    }
    public function mark_as_read()
    {
        $guest_id = $this->input->post('guest_id');
        if (!$guest_id) return;

        $this->db->where('guest_id', $guest_id);
        $this->db->where('status', 'unread');
        $this->db->update('chat_messages', ['status' => 'read']);
    }
    public function get_messages()
    {
        $guest_id = $this->session->userdata('guest_id');

        if (!$guest_id) {
            echo json_encode([]);
            return;
        }

        $chat = $this->db->where('guest_id', $guest_id)->get('chat_messages')->row();

        if ($chat) {
            echo json_encode(json_decode($chat->message, true));
        } else {
            echo json_encode([]);
        }
    }



    // For Admin
    public function get_unread_count()
    {
        $unreadCount = $this->db->where("status", 'unread')->count_all_results("chat_messages");
        echo json_encode(["unread_count" => $unreadCount]);
    }

    public function admin_typing()
    {
        $guest_id = $this->input->post('guest_id', true);
        $this->db->where('guest_id', $guest_id)->update('chat_messages', ['admin_typing' => 1]);
        echo json_encode(["success" => true]);
    }

    public function admin_stopped_typing()
    {
        $guest_id = $this->input->post('guest_id', true);
        $this->db->where('guest_id', $guest_id)->update('chat_messages', ['admin_typing' => 0]);
        echo json_encode(["success" => true]);
    }
}
