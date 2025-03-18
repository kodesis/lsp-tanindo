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
        $message = $this->input->post('message', true);

        if (!empty($message)) {
            $this->db->insert('chat_messages', [
                'guest_id'    => $guest_id,
                'message'     => $message,
                'sender_type' => 'guest'
            ]);
        }
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
        if (!$guest_id) {
            echo json_encode([]);
            return;
        }

        $this->db->where('guest_id', $guest_id);
        $this->db->order_by('created_at', 'ASC'); // ✅ Oldest messages first
        $query = $this->db->get('chat_messages');

        echo json_encode($query->result());
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
        $guest_id = $this->input->post('guest_id');
        $message = $this->input->post('message');

        if (!$guest_id || !$message) {
            echo json_encode(["error" => "Invalid request"]);
            return;
        }

        $data = [
            'guest_id' => $guest_id,
            'message' => $message,
            'sender_type' => 'admin', // Mark as admin message
            // 'created_at' => date("Y-m-d H:i:s")
        ];

        $this->db->insert('chat_messages', $data);
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
        $guest_id = $this->session->userdata('guest_id'); // Identify the guest

        if (!$guest_id) {
            echo json_encode([]);
            return;
        }

        $this->db->where('guest_id', $guest_id);
        $this->db->order_by('created_at', 'ASC'); // ✅ Oldest messages first
        $query = $this->db->get('chat_messages');

        echo json_encode($query->result());
    }

    // For Admin
    public function get_unread_count()
    {
        $unreadCount = $this->db->where("status", 'unread')->count_all_results("chat_messages");
        echo json_encode(["unread_count" => $unreadCount]);
    }
}
