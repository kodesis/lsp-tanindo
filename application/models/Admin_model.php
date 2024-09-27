<?php
class Admin_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  // Fungsi untuk mendapatkan user dengan paginasi dan pencarian
  public function get_users($limit, $start, $search = '')
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('status !=', 1);  // Kondisi status tidak sama dengan 1

    // Jika ada pencarian, tambahkan kondisi pencarian
    if ($search != '') {
      $this->db->like('full_name', $search);
      $this->db->or_like('email', $search);
      $this->db->or_like('mobile_number', $search);  // Asumsikan ada kolom mobile_number
    }

    $this->db->limit($limit, $start); // Paginasi
    $query = $this->db->get();
    return $query->result_array();
  }

  // Fungsi untuk menghitung total user (dengan atau tanpa pencarian)
  public function count_all_users($search = '')
  {
    $this->db->from('users');
    $this->db->where('status !=', 1);  // Kondisi status tidak sama dengan 1

    // Jika ada pencarian, tambahkan kondisi pencarian
    if ($search != '') {
      $this->db->like('full_name', $search);
      $this->db->or_like('email', $search);
      $this->db->or_like('mobile_number', $search);  // Asumsikan ada kolom mobile_number
    }

    return $this->db->count_all_results();
  }

  // Fungsi untuk mengupdate status user berdasarkan UID
  public function update_user_status_by_uid($uid, $new_status)
  {
    $this->db->where('uid', $uid);
    $this->db->update('users', ['is_verified' => $new_status]);
  }

  // Dapatkan semua pelatih
  public function get_all_pelatih()
  {
    $query = $this->db->where('status =', 2)->get('users');
    return $query->result_array();
  }

  // Dapatkan semua pelatihan dengan join ke tabel pelatih
  public function get_all_pelatihan()
  {
    $this->db->select('courses.*, users.full_name');
    $this->db->from('courses');
    $this->db->join('users', 'courses.teacher_uid = users.uid');
    $this->db->where('users.status =', 2);
    $query = $this->db->get();
    return $query->result_array();

    // query untuk mengambil seluruh data dari tabel courses mentor agar 1 mentor bisa banyak kursus dan sebaliknya
    // $this->db->select('c.*, u.full_name');
    // $this->db->from('courses c');
    // $this->db->join('courses_mentor cm', 'c.uid = cm.courses_uid');
    // $this->db->join('users u', 'cm.mentor_uid = u.uid');
    // $this->db->where('u.status =', 2);
    // $query = $this->db->get();
    // return $query->result_array();
  }

  // Insert data pelatihan baru
  public function insert_pelatihan($data)
  {
    $this->db->insert('courses', $data);
  }

  // Dapatkan pelatihan berdasarkan ID
  public function get_pelatihan_by_id($id)
  {
    $this->db->select('courses.*, users.full_name');
    $this->db->from('courses');
    $this->db->join('users', 'courses.teacher_uid = users.uid');
    $this->db->where('courses.uid', $id);
    $query = $this->db->get();
    return $query->row();
  }

  // Update pelatihan berdasarkan ID
  public function update_pelatihan($id, $data)
  {
    $this->db->where('uid', $id);
    $this->db->update('courses', $data);
  }

  // Hapus pelatihan berdasarkan ID
  public function delete_pelatihan($id)
  {
    $this->db->where('uid', $id);
    $this->db->delete('courses');
  }

  public function get_data_report()
  {
    $this->db->select('u.*,uc.course_uid,uc.status,cs.course_name');
    $this->db->from('users u');
    $this->db->join('user_courses uc', 'uc.user_uid = u.uid');
    $this->db->join('courses cs', 'uc.course_uid = cs.uid');
    $this->db->where('u.status', 3);
    $query = $this->db->get();
    return $query->result_array();
  }
}
