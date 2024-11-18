<?php
class Home_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function insert($data_insert)
  {
    $this->db->insert('user_ktna', $data_insert);
  }

  public function get_nomor()
  {
    return $this->db->select('max(nomor) as max')->get('user_ktna')->row_array();
  }
  public function get_nomor_urut()
  {
    return $this->db->select('max(nomor_urut) as nomor_max')->get('user_ktna')->row_array();
  }

  public function get_artikel($limit, $start, $search = '')
  {
    $this->db->select('*');
    $this->db->from('artikel');

    // Jika ada pencarian, tambahkan kondisi pencarian
    if ($search != '') {
      $this->db->like('title', $search);
    }
    $this->db->order_by('tanggal', 'DESC');
    $this->db->limit($limit, $start); // Paginasi
    $query = $this->db->get();
    return $query->result_array();
  }
  public function count_all_artikel($search = '')
  {
    $this->db->from('artikel');

    // Jika ada pencarian, tambahkan kondisi pencarian
    if ($search != '') {
      $this->db->like('title', $search);
    }
    $this->db->order_by('tanggal', 'DESC');

    return $this->db->count_all_results();
  }
  public function get_artikel_populer()
  {
    $this->db->select('*');
    $this->db->from('artikel');
    $this->db->order_by('view_count', 'DESC');
    $this->db->limit(4);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_artikel_id($id)
  {
    $this->db->select('*');
    $this->db->from('artikel');
    $this->db->where('Id', $id);
    $query = $this->db->get();
    return $query->row();
  }
  public function update_count($id)
  {
    $this->db->set('view_count', 'view_count + 1', FALSE); // FALSE prevents escaping of the expression
    $this->db->where('Id', $id);
    $this->db->update('artikel'); // Replace 'your_table_name' with your actual table name
  }
}
