<?php
class User_model extends CI_Model
{
  public function get_user($email)
  {
    $this->db->where('email', $email);
    return $this->db->get('users')->row();
  }

  public function increment_login_attempts($user_id)
  {
    // Menambah login attempts
    $this->db->set('login_attempts', 'login_attempts+1', FALSE);
    $this->db->set('last_login_attempt', 'NOW()', FALSE);
    $this->db->where('uid', $user_id);
    $this->db->update('users');
  }

  public function reset_login_attempts($user_id)
  {
    // Reset login attempts saat berhasil login
    $this->db->set('login_attempts', 0);
    $this->db->where('uid', $user_id);
    $this->db->update('users');
  }

  public function register($data)
  {
    return $this->db->insert('users', $data);
  }

  // ini belom berfungsi 100%
  public function verify_email($code)
  {
    $this->db->where('verification_code', $code);
    $this->db->set('is_verified', 1);
    $this->db->update('users');
    return $this->db->affected_rows();
  }

  public function is_email_taken($email)
  {
    return $this->db->get_where('users', array('email' => $email))->num_rows() > 0;
  }

  // Fungsi untuk mengambil usernumber tertinggi
  public function get_max_usernumber()
  {
    $this->db->select_max('user_number'); // Mengambil nilai tertinggi dari kolom 'usernumber'
    $query = $this->db->get('users'); // Mengambil data dari tabel 'user'
    return $query->row()->user_number; // Mengembalikan nilai tertinggi
  }

  // fungsi untuk mengambil Course
  public function get_course_limit()
  {
    $this->db->select('c.uid, c.course_name');
    $this->db->from('courses c');
    $this->db->limit(3);
    $this->db->order_by('uid', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  public function get_course()
  {
    $this->db->select('c.uid, c.course_name');
    $this->db->from('courses c');
    $this->db->order_by('uid', 'DESC');
    // $this->db->limit(3);
    $query = $this->db->get();
    return $query->result();
  }
  // Fungsi untuk mengambil usernumber tertinggi
  public function get_max_sertif_num()
  {
    $this->db->select_max('number'); // Mengambil nilai tertinggi dari kolom 'certificate_number'
    $query = $this->db->get('user_courses'); // Mengambil data dari tabel 'user_courses'
    return $query->row()->number; // Mengembalikan nilai tertinggi certificate_number
  }

  public function save_user_course($data)
  {
    return $this->db->insert('user_courses', $data);
  }

  public function check_existing_files($user_uid)
  {
    // Cek apakah user sudah memiliki file di database
    $this->db->where('user_uid', $user_uid);
    $query = $this->db->get('user_courses');
    return $query->row(); // Mengembalikan row jika ditemukan, null jika tidak
  }

  public function delete_old_files($files)
  {
    foreach ($files as $file) {
      $file_path = './uploads/' . $file;
      if (is_file($file_path) && file_exists($file_path)) {
        unlink($file_path); // Hapus file
      }
    }
  }


  public function save_multiple_files($user_uid, $file_names)
  {
    // Simpan info file
    $data = array(
      'user_uid' => $user_uid,
      'image' => $file_names['image'],
      'ktp' => $file_names['ktp'],
      'ijasah' => $file_names['ijasah'],
      'sertifikat' => $file_names['sertifikat'],
      'sk_pertanian' => $file_names['sk_pertanian'],
      'bukti_bayar' => $file_names['bukti_bayar'],
      'upload_time' => date("Y-m-d H:i:s")
    );
    $this->db->replace('user_courses', $data); // replace jika sudah ada data
  }

  // ambil data user course berdasarkan user uid yang aktif dan mecek apakah user tersebut sudah lulus atau belum 
  public function get_data_course($user_uid)
  {
    $this->db->select('uc.user_uid, uc.course_uid, c.course_name, uc.certificate_number, uc.status, uc.accepted_time');
    $this->db->from('user_courses uc');
    $this->db->join('courses c', 'uc.course_uid = c.uid');
    $this->db->where('uc.user_uid', $user_uid); // Ganti $user_id dengan ID user yang diinginkan
    // $this->db->group_start();
    // $this->db->where('uc.status', 1);
    // $this->db->where('uc.status', 1);
    // $this->db->or_where('uc.status !=', 1);
    // $this->db->group_end();
    $this->db->order_by('uc.uid');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_data_course_all($user_uid)
  {
    $this->db->select('uc.uid, uc.user_uid, uc.course_uid, c.course_name, uc.certificate_number, uc.status');
    $this->db->from('user_courses uc');
    $this->db->join('courses c', 'uc.course_uid = c.uid');
    $this->db->where('uc.user_uid', $user_uid); // Ganti $user_id dengan ID user yang diinginkan
    // $this->db->group_start();
    // $this->db->where('uc.status', 1);
    // $this->db->where('uc.status', 1);
    // $this->db->or_where('uc.status !=', 1);
    // $this->db->group_end();
    $this->db->order_by('uc.uid');
    $query = $this->db->get();
    return $query->result_array();
  }
  // ambil data berdasarkan kode certif user yang mau di print
  public function get_data_sertif($certificate_number)
  {
    $this->db->select('uc.user_uid, uc.course_uid, c.course_name, uc.certificate_number, uc.status, u.register_num, u.full_name');
    $this->db->from('user_courses uc');
    $this->db->join('courses c', 'uc.course_uid = c.uid');
    $this->db->join('users u', 'uc.user_uid = u.uid');
    $this->db->where('uc.certificate_number', $certificate_number); // Ganti $certificate_number dengan nilai yang diinginkan
    $query = $this->db->get();
    return $query->row_array();

    // var_dump($query->row());
    // exit;
  }
  public function get_data_assessor($uid)
  {
    $this->db->select('a.*, b.course_name, b.course_description, b.course_information');
    $this->db->from('users a');
    $this->db->join('courses b', 'a.uid = b.teacher_uid', '');
    $this->db->where('b.uid', $uid); // Ganti $user_id dengan ID user yang diinginkan
    // $this->db->group_start();
    // $this->db->where('a.status', '1');
    // $this->db->where('a.user_uid', $this->session->userdata('user_id'));
    // $this->db->group_end();
    $query = $this->db->get();
    return $query->row();
  }
  public function get_data_assesmen($uid)
  {
    $this->db->select('a.*, b.assignments');
    $this->db->from('grades a');
    $this->db->join('assesmen b', 'a.assesment_uid = b.uid', '');
    $this->db->where('b.course_uid', $uid); // Ganti $user_id dengan ID user yang diinginkan
    // $this->db->group_start();
    // $this->db->where('a.status', '1');
    $this->db->where('a.user_uid', $this->session->userdata('user_id'));
    // $this->db->group_end();
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_data_assesmen_pra_assesmen($uid)
  {
    $this->db->select('a.*, b.kode_unit, b.judul_unit_kompetensi, b.assignments');
    $this->db->from('grades a');
    $this->db->join('assesmen b', 'a.assesment_uid = b.uid', '');
    $this->db->where('b.tipe_assesmen', 1); // Ganti $user_id dengan ID user yang diinginkan
    $this->db->where('b.course_uid', $uid); // Ganti $user_id dengan ID user yang diinginkan
    // $this->db->group_start();
    // $this->db->where('a.status', '1');
    $this->db->where('a.user_uid', $this->session->userdata('user_id'));
    // $this->db->group_end();
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_data_assesmen_uji_kompetensi($uid)
  {
    $this->db->select('a.*, b.kode_unit, b.judul_unit_kompetensi, b.assignments');
    $this->db->from('grades a');
    $this->db->join('assesmen b', 'a.assesment_uid = b.uid', '');
    $this->db->where('b.tipe_assesmen', 2); // Ganti $user_id dengan ID user yang diinginkan
    $this->db->where('b.course_uid', $uid); // Ganti $user_id dengan ID user yang diinginkan
    // $this->db->group_start();
    // $this->db->where('a.status', '1');
    $this->db->where('a.user_uid', $this->session->userdata('user_id'));
    // $this->db->group_end();
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_data_detail_assesmen($uid)
  {
    $this->db->select('a.*, b.course_uid, b.kode_unit, b.judul_unit_kompetensi, b.assignments, b.file, b.akses');
    $this->db->from('grades a');
    $this->db->join('assesmen b', 'a.assesment_uid = b.uid', '');
    $this->db->where('a.uid', $uid); // Ganti $user_id dengan ID user yang diinginkan
    // $this->db->group_end();
    $query = $this->db->get();
    return $query->row();
  }
  public function get_data_detail_assesmen_uid($uid)
  {
    $this->db->select('b.course_uid');
    $this->db->from('grades a');
    $this->db->join('assesmen b', 'a.assesment_uid = b.uid', '');
    $this->db->where('a.uid', $uid); // Ganti $user_id dengan ID user yang diinginkan
    // $this->db->group_end();
    $query = $this->db->get();
    return $query->row();
  }
  public function update_grades($data, $where)
  {
    return $this->db->update('grades', $data, $where);
  }
  public function get_data_assesmen_pra_assesmen_staff($uid, $course_uid)
  {
    $this->db->select('a.*, b.kode_unit, b.judul_unit_kompetensi, b.assignments, b.akses');
    $this->db->from('grades a');
    $this->db->join('assesmen b', 'a.assesment_uid = b.uid', '');
    $this->db->where('b.tipe_assesmen', 1); // Ganti $user_id dengan ID user yang diinginkan
    $this->db->where('b.course_uid', $course_uid); // Ganti $user_id dengan ID user yang diinginkan
    // $this->db->group_start();
    // $this->db->where('a.status', '1');
    $this->db->where('a.user_uid', $uid);
    $this->db->order_by('b.rekomendasi', 'ASC');
    // $this->db->group_end();
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_data_assesmen_uji_kompetensi_staff($uid, $course_uid)
  {
    $this->db->select('a.*, b.kode_unit, b.judul_unit_kompetensi, b.assignments, b.akses');
    $this->db->from('grades a');
    $this->db->join('assesmen b', 'a.assesment_uid = b.uid', '');
    $this->db->where('b.tipe_assesmen', 2); // Ganti $user_id dengan ID user yang diinginkan
    $this->db->where('b.course_uid', $course_uid); // Ganti $user_id dengan ID user yang diinginkan
    // $this->db->group_start();
    // $this->db->where('a.status', '1');
    $this->db->where('a.user_uid', $uid);
    $this->db->order_by('b.rekomendasi', 'ASC');
    // $this->db->group_end();
    $query = $this->db->get();
    return $query->result_array();
  }
  public function insert_apl02($data)
  {
    return $this->db->insert('apl02', $data);
  }

  public function get_user_courses($user_courses)
  {
    $this->db->where('user_uid', $user_courses);
    $this->db->order_by('uid', 'DESC');
    $query = $this->db->get('user_courses');
    return $query->row_array();
  }
}
