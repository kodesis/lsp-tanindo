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
}
