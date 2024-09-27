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
  public function get_course()
  {
    $this->db->select('c.uid, c.course_name');
    $this->db->from('courses c');
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
    $query = $this->db->get('documents');
    return $query->row(); // Mengembalikan row jika ditemukan, null jika tidak
  }

  public function delete_old_files($files)
  {
    // Hapus semua file lama dari direktori jika file ada
    foreach ($files as $file) {
      $file_path = './uploads/' . $file;
      if (file_exists($file_path)) {
        unlink($file_path); // Hapus file
      }
    }
  }

  public function save_multiple_files($user_uid, $file_names)
  {
    // Simpan info file
    $data = array(
      'user_uid' => $user_uid,
      'image' => $file_names['foto'],
      'ktp' => $file_names['foto_ktp'],
      'ijasah' => $file_names['ijasah'],
      'sertifikat' => $file_names['sertifikat'],
      'sk_pertanian' => $file_names['surat_ijin'],
      'upload_time' => date("Y-m-d H:i:s")
    );
    $this->db->replace('documents', $data); // replace jika sudah ada data
  }

  // ambil data user course berdasarkan user uid yang aktif dan mecek apakah user tersebut sudah lulus atau belum 
  public function get_data_course($user_uid)
  {
    $this->db->select('uc.user_uid, uc.course_uid, c.course_name, uc.certificate_number, uc.status');
    $this->db->from('user_courses uc');
    $this->db->join('courses c', 'uc.course_uid = c.uid');
    $this->db->where('uc.user_uid', $user_uid); // Ganti $user_id dengan ID user yang diinginkan
    $this->db->group_start();
    $this->db->where('uc.status', 1);
    $this->db->or_where('uc.status !=', 1);
    $this->db->group_end();
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
}
