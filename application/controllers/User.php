<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    cek_akses('3');  // Hanya user yang dapat mengakses controller ini
  }

  public function index()
  {
    $data['course'] = $this->User_model->get_course_limit();
    $data['users'] = $this->User_model->get_user($this->session->userdata('email'));
    $data['data_course'] = $this->User_model->get_data_course($this->session->userdata('user_id'));

    $data['title'] = 'Dashboard User';
    $data['active_menu'] = 'User'; // nanti ganti jadi username
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('user/dashboard');
    $this->load->view('statis_template/dashboard_footer');
  }

  public function save_program_choise()
  {
    $course_uid = $this->input->post('course_uid');
    $course_name = $this->input->post('course_name');
    $user_uid = $this->session->userdata('user_id');
    $user_email = $this->session->userdata('email');
    $tujuan_asesmen = $this->input->post('tujuan_asesmen');


    // Bagian pertama dan kedua selalu REGPPP
    $bagian1 = "74909";
    $bagian2 = "2132";

    // menentukan nomor program sertifikasi
    if ($course_uid == '1') {
      $bagian3 = '4';
    } elseif ($course_uid == '2') {
      $bagian3 = '7';
    }

    // Ambil nilai tertinggi dari kolom 'certificate_number'
    $maxcertificate_number = $this->User_model->get_max_sertif_num();
    $number = $maxcertificate_number + 1;
    $bagian4 = sprintf("%05d", $number);

    // Ambil tahun registrasi saat ini
    $bagian5 = date("Y");

    // Gabungkan semua bagian
    $nomorsertifikat = "$bagian1-$bagian2-$bagian3-$bagian4-$bagian5";

    $data = [
      'user_uid' => $user_uid,
      'course_uid' => $course_uid,
      'certificate_number' => $nomorsertifikat,
      'number' => $bagian4,
      'status' => 3,
      'tujuan_asesmen' => $tujuan_asesmen,
    ];

    $file_fields = ['image', 'ktp', 'ijasah', 'sertifikat', 'sk_pertanian', 'bukti_bayar'];
    $file_names = [];

    // Cek apakah user sudah memiliki file yang diupload sebelumnya
    $existing_files = $this->User_model->check_existing_files($user_uid);
    if ($existing_files) {
      // Hapus file lama sebelum upload baru
      $files_to_delete = [
        $existing_files->image,
        $existing_files->ktp,
        $existing_files->ijasah,
        $existing_files->sertifikat,
        $existing_files->sk_pertanian,
        $existing_files->bukti_bayar,
      ];
      $this->User_model->delete_old_files($files_to_delete);
    }

    // Proses upload untuk setiap file
    foreach ($file_fields as $field) {
      // Konfigurasi upload untuk setiap file
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['max_size'] = 5120; // Maksimal 5 MB
      $config['file_name'] = $field . '_' . time(); // Nama file unik dengan timestamp
      $this->upload->initialize($config);

      if (!$this->upload->do_upload($field)) {
        // Jika salah satu upload gagal
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('user', $error);
        return;
      } else {
        // Jika upload berhasil
        $upload_data = $this->upload->data();
        $file_names[$field] = $upload_data['file_name'];
        $data[$field] = $upload_data['file_name'];
      }
    }
    $folderPath = FCPATH . "uploads/tanda_tangan/"; // Full path to the folder

    // Ensure the directory exists
    if (!is_dir($folderPath)) {
      mkdir($folderPath, 0777, true);
    }
    $signatureData = $this->input->post('signed'); // Get Base64 signature
    // var_dump($signatureData);

    if (!empty($signatureData) && strpos($signatureData, 'data:image/') === 0) {
      $image_parts = explode(";base64,", $signatureData);
      $image_type_aux = explode("image/", $image_parts[0]);
      $image_type = isset($image_type_aux[1]) ? $image_type_aux[1] : 'png';

      // Decode Base64
      $image_base64 = base64_decode($image_parts[1]);

      // Generate unique filename
      $fileName = uniqid() . '.' . $image_type;
      $filePath = $folderPath . $fileName;
      file_put_contents($filePath, $image_base64);
      // Save the image

      $file_names['signature'] = $fileName;
      $data['signature'] = $fileName;
    } else {
      $error = array('error' => $this->upload->display_errors());
      var_dump($error);
      return;
    }



    $institute = $this->input->post('institute');
    $jabatan = $this->input->post('jabatan');
    $alamat_kantor = $this->input->post('alamat_kantor');
    $kode_pos_kantor = $this->input->post('kode_pos_kantor');
    $mobile_number_kantor = $this->input->post('mobile_number_kantor');
    $fax_kantor = $this->input->post('fax_kantor');
    $email_kantor = $this->input->post('email_kantor');
    $data_update_user = [
      'institute' => $institute,
      'jabatan' => $jabatan,
      'alamat_kantor' => $alamat_kantor,
      'kode_pos_kantor' => $kode_pos_kantor,
      'mobile_number_kantor' => $mobile_number_kantor,
      'fax_kantor' => $fax_kantor,
      'email_kantor' => $email_kantor,
    ];
    $this->db->where('uid', $user_uid);
    $this->db->update('users', $data_update_user);



    // var_dump($data);
    // exit;

    // Simpan ke database
    if ($this->User_model->save_user_course($data)) {
      // Simpan informasi file ke database
      // $this->User_model->save_multiple_files($user_uid, $file_names);
      $data = array('upload_data' => $file_names);

      // Send verification email
      $this->send_email($user_email, $course_uid, $course_name);

      $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan.</div>');
    } else {
      $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat menyimpan data.</div>');
    }
    redirect('user');
  }

  public function send_email($email, $course_uid, $course_name)
  {
    $username = $this->session->userdata('username');
    $subject = "Notifikasi Pendaftaran Program " . $course_name;
    // $message = "Click the following link to verify your email: " . base_url() . "auth/verify/" . $verification_code;
    $message = "<p>Hi " . $email . ",</p>
    Selamat Kepada ' . $username . ' Silhkan Untuk Melengkapi data yang belum ada Atau. 
    silahkan isi formulir dan lakukan assesment mandiri pada file yang tertera di bawah ini.';
    <p>Salam,</p>
    <p>Tim LSP Tanindo</p>";

    if ($course_uid == '1') {
      $pdf_path = 'assets/document/Permohonan Sertifikasi Kompetensi_Fasilitator.pdf'; // Path ke file PDF('');
      $pdf_send = 'assets/document/Asesmen Mandiri FASILITATOR.pdf'; // Path ke file PDF('');
    } else {
      $pdf_path = ('assets/document/Permohonan Sertifikasi Kompetensi_Supervisor.pdf');
      $pdf_send = ('assets/document/Asesmen Mandiri_Supervisor.pdf');
    }

    $this->email->from('adminlsp@lsptanindo.com', 'LSP Tanindo');
    $this->email->to($email);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->attach($pdf_path);
    $this->email->attach($pdf_send);

    $this->email->send();
  }

  public function download_sertifikat($certificate_number)
  {
    $data['data_sertif'] = $this->User_model->get_data_sertif($certificate_number);

    // var_dump($certificate_number);
    // print_r($data['data_sertif']);
    // exit;

    $this->load->library('pdfgenerator');
    $data['title'] = "Sertifikat";
    $file_pdf = $data['title'];
    $paper = 'A4'; //15x25mm.
    $orientation = "potrait";
    // $html = $this->load->view('member/kartutanindo', $data, true);
    $html = $this->load->view('user/sertifikat', $data, true);
    $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }

  public function profil()
  {
    $data['users'] = $this->User_model->get_user($this->session->userdata('email'));
    $data['user_doc'] = $this->db->get_where('documents', ['user_uid' => $this->session->userdata('user_id')])->row_array();


    $data['title'] = 'Profil';
    $data['active_menu'] = 'profil'; // nanti ganti jadi username
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('user/profil');
    $this->load->view('statis_template/dashboard_footer');
  }
  public function assesmen($uid)
  {
    $data['data_assessor'] = $this->User_model->get_data_assessor($uid);
    $data['data_assesmen_pra_assesmen'] = $this->User_model->get_data_assesmen_pra_assesmen($uid);
    $data['data_assesmen_uji_kompetensi'] = $this->User_model->get_data_assesmen_uji_kompetensi($uid);

    $data['title'] = 'Assesmen User';
    $data['active_menu'] = 'User'; // nanti ganti jadi username
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('user/assesmen');
    $this->load->view('statis_template/dashboard_footer');
  }
  public function detail_assesmen($uid)
  {
    $data['data_soal'] = $this->User_model->get_data_detail_assesmen($uid);

    $data['title'] = 'Assesmen User';
    $data['active_menu'] = 'User'; // nanti ganti jadi username
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('user/detail_assesmen');
    $this->load->view('statis_template/dashboard_footer');
  }
  public function save_answer()
  {
    $id = $this->input->post('id_assesmen');
    $data_update = [
      'status' => 2,
    ];

    $config['upload_path'] = FCPATH . 'uploads/answer/'; // Same as the config file
    $config['allowed_types'] = 'docx|word|pdf';
    // $config['file_name'] = 'thumbnail_' . $title;


    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ($this->upload->do_upload('answer')) {
      $image_data = $this->upload->data();
      $imgdata = file_get_contents($image_data['full_path']);
      $thumbnail = $image_data['file_name'];
      $data_update['answer'] = $thumbnail;
    }
    // echo ($id);
    $assesmen = $this->User_model->get_data_detail_assesmen_uid($id);
    // var_dump($assesmen);
    var_dump($data_update);

    if ($this->User_model->update_grades($data_update, array('uid' => $id))) {
      echo 'success';
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Update Data Successfully Added please check in the table.
        </div>');
    } else {
      echo 'error';
    }


    redirect('user/Assesmen/' . $assesmen->course_uid);
  }
  public function course()
  {
    $data['course'] = $this->User_model->get_course();
    $data['users'] = $this->User_model->get_user($this->session->userdata('email'));
    // $data['data_course'] = $this->User_model->get_data_course($this->session->userdata('user_id'));

    $data['title'] = 'Course User';
    $data['active_menu'] = 'User'; // nanti ganti jadi username
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('user/course');
    $this->load->view('statis_template/dashboard_footer');
  }
  public function sertifikasi()
  {
    // $data['sertifikasi'] = $this->User_model->get_sertifikasi();
    $data['users'] = $this->User_model->get_user($this->session->userdata('email'));
    $data['data_course'] = $this->User_model->get_data_course_all($this->session->userdata('user_id'));

    $data['title'] = 'Sertifikasi User';
    $data['active_menu'] = 'User'; // nanti ganti jadi username
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('user/sertifikasi');
    $this->load->view('statis_template/dashboard_footer');
  }
}
