<?php
class Staff_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  public function get_user_courses($mentor_uid)
  {
    $this->db->select('uc.*,u.full_name,c.course_name');
    $this->db->from('user_courses uc');
    $this->db->join('courses c', 'c.uid = uc.course_uid');
    $this->db->join('users u', 'u.uid = uc.user_uid');
    $this->db->where('c.teacher_uid', $mentor_uid);
    $query = $this->db->get();
    return $query->result_array();

    // echo '<pre>';
    // print_r($query->result_array());
    // echo '</pre>';
    // exit;
  }

  public function get_user_name($uid)
  {
    $this->db->select('uc.*,u.full_name');
    $this->db->from('user_courses uc');
    $this->db->join('users u', 'u.uid = uc.user_uid');
    $this->db->where('uc.uid =', $uid);
    $query = $this->db->get();
    return $query->row();

    // var_dump($uid);
    // echo '<pre>';
    // print_r($query);
    // echo '</pre>';
    // exit;
  }

  public function get_metode_dit()
  {
    $this->db->select('*');
    $this->db->from('assesmen');
    $this->db->where('course_uid =', 1);
    $this->db->where('assesment_metode =', 1);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_metode_obser()
  {
    $this->db->select('*');
    $this->db->from('assesmen');
    $this->db->where('course_uid =', 1);
    $this->db->where('assesment_metode =', 2);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_metode_port()
  {
    $this->db->select('*');
    $this->db->from('assesmen');
    $this->db->where('course_uid =', 1);
    $this->db->where('assesment_metode =', 3);
    $query = $this->db->get();
    return $query->result_array();
  }

  // Simpan data assessment
  public function save_assessment($data)
  {
    return $this->db->insert_batch('grades', $data);
  }

  // public function get_status_assesment($uid)
  // {
  //   $this->db->select('grades.status, assesmen.assesment_metode, assesmen.uid, user_courses.certificate_number');
  //   $this->db->from('user_courses');
  //   $this->db->join('grades', 'grades.user_uid = user_courses.user_uid', 'left');
  //   $this->db->join('assesmen', 'assesmen.uid = grades.assesment_uid', 'left');
  //   $this->db->where('user_courses.uid', $uid); // Ganti $user_courses_uid dengan nilai UID yang diinginkan
  //   $query = $this->db->get();
  //   return $query->result_array();

  //   // echo '<pre>';
  //   // print_r($query->result_array());
  //   // echo '</pre>';
  //   // exit;
  // }

  public function save_status($data)
  {
    // Cek apakah id ada, jika ada berarti update, jika tidak ada maka insert baru
    if (isset($data['uid']) && !empty($data['uid'])) {
      // Update status
      $this->db->where('uid', $data['uid']);
      return $this->db->update('user_courses', $data);
    } else {
      // Insert new status
      return $this->db->insert('user_courses', $data);
    }
  }
  public function check_assesmen($user_id_assessment, $id_assessment)
  {
    $this->db->select('*');
    $this->db->from('grades');
    $this->db->where('user_uid', $user_id_assessment);
    $this->db->where('assesment_uid', $id_assessment);

    // $this->db->where('id_board', $id);
    $query = $this->db->get();
    return $query->row();
  }

  public function get_detail_assesmen($id)
  {
    $this->db->select('*');
    $this->db->from('detail_assesmen');
    $this->db->where('uid_assesmen', $id);
    // $this->db->where('uid_user', $this->session->userdata('user_id'));
    $query = $this->db->get();
    return $query->result_array();
  }
  public function delete_detail_assesmen($id)
  {
    $this->db->where('uid', $id);
    $this->db->delete('detail_assesmen');
  }
}
