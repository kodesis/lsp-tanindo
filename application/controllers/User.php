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
      'status' => '3',
      'tujuan_asesmen' => $tujuan_asesmen,
    ];

    $file_fields = ['image', 'ktp', 'ijasah', 'sertifikat', 'sk_pertanian'];
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

      // return;
      if (!$this->upload->do_upload($field)) {
        // Jika salah satu upload gagal
        $error = array('error' => $this->upload->display_errors());
        // $this->load->view('user', $error);
        var_dump($error);
        echo $field;
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
    if ($user_courses_uid = $this->User_model->save_user_course($data)) {
      // Simpan informasi file ke database
      // $this->User_model->save_multiple_files($user_uid, $file_names);
      $data = array('upload_data' => $file_names);

      // Send verification email
      $this->send_email($user_email, $course_uid, $course_name);

      $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data berhasil disimpan.</div>');

      $apl01 = $this->db->from('assesmen')->where('course_uid', $course_uid)->where('kode_unit', 'FR.APL01')->get()->row();
      $data = [
        'user_uid' => $user_uid,
        'assesment_uid' => $apl01->uid,
        'status' => '2',
        'correct' => 'Asesmen Dapat Di Lanjutkan'
      ];

      $this->db->insert('grades', $data);

      $data_riwayat = [
        'user_uid' => $user_uid,
        'user_courses_uid' => $user_courses_uid,
        'assesment_uid' => $apl01->uid,
        'status' => '2',
        'text' => 'Menunggu Acc dari Admin'
      ];
      $this->db->insert('riwayat_asesment', $data);


      $apl02 = $this->db->from('assesmen')->where('course_uid', $course_uid)->where('kode_unit', 'FR.APL02')->get()->row();
      $data = [
        'user_uid' => $user_uid,
        'assesment_uid' => $apl02->uid,
        'status' => '1'
      ];
      $this->db->insert('grades', $data);
    } else {
      $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat menyimpan data.</div>');
    }
    redirect('user/');
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
      'asesi_upload_time' => date('Y-m-d H:i:s') // Current date and time
    ];

    $config['upload_path'] = FCPATH . 'uploads/answer/'; // Same as the config file
    $config['allowed_types'] = 'docx|word|pdf';
    // $config['file_name'] = 'thumbnail_' . $title;
    $config['max_size']      = 5120; // Limit file size to 5MB (in KB)


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

      $uc = $this->db->select('uid')->from('user_courses')->where('user_uid', $assesmen->user_uid)->where('course_uid', $assesmen->course_uid)->get()->row();

      $data_riwayat = [
        'user_uid' => $assesmen->user_uid,
        'user_courses_uid' => $uc->uid,
        'assesment_uid' => $assesmen->assesment_uid,
        'status' => '2',
        'text' => 'Menunggu Acc dari Staff'
      ];
      $this->db->insert('riwayat_asesment', $data_riwayat);
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
  public function apl02($uid)
  {
    // $data['sertifikasi'] = $this->User_model->get_sertifikasi();
    $cek_selesai = $this->db->from('grades')->where('uid', $uid)->get()->row();
    if ($cek_selesai->status == '2' || $cek_selesai->status == '3') {
      redirect('user/apl02_view/' . $uid);
    }

    // var_dump($cek_selesai);
    // echo $cek_selesai->assesment_uid;
    $data['users'] = $this->User_model->get_user($this->session->userdata('email'));
    $data['data_course'] = $this->User_model->get_data_course_all($this->session->userdata('user_id'));

    $cek_course = $this->db->from('assesmen')->where('uid', $cek_selesai->assesment_uid)->get()->row();


    $data['title'] = 'APL02';
    $data['active_menu'] = 'User'; // nanti ganti jadi username
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    if ($cek_course->course_uid == '1') {
      $this->load->view('user/apl02_1');
    } else if ($cek_course->course_uid == '2') {
      $this->load->view('user/apl02_2');
    }
    $this->load->view('statis_template/dashboard_footer');
  }
  public function apl02_view($uid)
  {
    // $data['sertifikasi'] = $this->User_model->get_sertifikasi();
    $cek_selesai = $this->db->from('grades')->where('uid', $uid)->get()->row();
    if ($cek_selesai->status == '1') {
      redirect('user/apl02/' . $uid);
    }
    $cek_course = $this->db->from('assesmen')->where('uid', $cek_selesai->assesment_uid)->get()->row();
    $cek_user = $this->db->select('full_name')->from('users')->where('users.uid', $cek_selesai->user_uid)->get()->row();


    $data['users'] = $this->User_model->get_user($this->session->userdata('email'));
    $data['data_course'] = $this->User_model->get_data_course_all($this->session->userdata('user_id'));
    $data['data_asesi'] = $cek_user;
    $data['data_grades'] = $cek_selesai;
    $jawaban = $this->db->from('apl02')->where('grades_uid', $uid)->get()->result();
    $groupedData = [];

    foreach ($jawaban as $item) {
      $kode_unit = $item->kode_unit;
      $elemen = $item->elemen;

      // Initialize kode_unit if not exists
      if (!isset($groupedData[$kode_unit])) {
        $groupedData[$kode_unit] = [];
      }

      // Initialize elemen if not exists
      if (!isset($groupedData[$kode_unit][$elemen])) {
        $groupedData[$kode_unit][$elemen] = [];
      }

      // Add item to the appropriate group
      $groupedData[$kode_unit][$elemen][] = $item;
    }

    // Debug output
    // echo "<pre>";
    // print_r($groupedData);
    // echo "</pre>";
    $data['jawaban'] = $groupedData;
    $data['title'] = 'APL02';
    $data['active_menu'] = 'User'; // nanti ganti jadi username
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    if ($cek_course->course_uid == '1') {
      $this->load->view('user/apl02_1_v');
    } else if ($cek_course->course_uid == '2') {
      $this->load->view('user/apl02_2_v');
    }
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

  public function save_apl02($grades_uid)
  {

    if (!isset($_POST['elemen']) || !is_array($_POST['elemen'])) {
      die("Error: elemen is not an array.");
    }
    foreach ($_POST['elemen'] as $kode_unit => $elemen_values) {
      if (!is_array($elemen_values)) {
        die("Error: elemen_values for $kode_unit is not an array.");
      }
      // echo "Kode Unit = $kode_unit";

      foreach ($elemen_values as $elemen_key => $kompeten) {
        if (!is_string($kompeten) && !is_numeric($kompeten)) {
          die("Error: kompeten value for $kode_unit elemen $elemen_key is invalid.");
        }
        // echo "<br>";
        // echo "Elemen Key = $elemen_key";
        // Extract elemen number (1, 2, 3)
        $elemen = intval($elemen_key);

        // Fetch `ijazah`, `sertifikat`, `sk` from `user_courses`
        $user_courses = $this->User_model->get_user_courses($this->session->userdata('user_id'));
        // echo ($this->session->userdata('user_id'));
        // var_dump($user_courses);

        $ijazah = !empty($user_courses['ijasah']) ? $user_courses['ijasah'] : '[]';
        $sertifikat = !empty($user_courses['sertifikat']) ? $user_courses['sertifikat'] : '[]';
        $sk = !empty($user_courses['sk_pertanian']) ? $user_courses['sk_pertanian'] : '[]';
        // Get `dokumen_digital`
        $dokumen_digital = isset($_POST['link'][$kode_unit][$elemen]) ? $_POST['link'][$kode_unit][$elemen] : '';

        // Process uploaded files
        $files_uploaded = $this->upload_files($kode_unit, $elemen);

        // Insert into database
        $data = [
          'grades_uid'       => $grades_uid,
          'kode_unit'       => $kode_unit,
          'elemen'          => $elemen,
          'kompeten'        => $kompeten,
          'ijazah'          => $ijazah,
          'sertifikat'      => $sertifikat,
          'sk'              => $sk,
          'dokumen_digital' => $dokumen_digital,
          'files'           => json_encode($files_uploaded)
        ];

        $this->User_model->insert_apl02($data);
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
      $data = array(
        'signature_asesi' => $fileName, // Replace with actual value
        'asesi_upload_time' => date('Y-m-d H:i:s'),
        'status' => 2,
      );

      $this->db->where('uid', $grades_uid); // Replace $grades_uid with the actual UID
      $this->db->update('grades', $data);

      $ad = $this->db->select('user_uid,assesment_uid, course_uid')->from('grades')->join('assesmen', 'assesmen.uid = grades.assesment_uid')->where('grades.uid', $grades_uid)->get()->row();
      $uc = $this->db->select('uid')->from('user_courses')->where('user_uid', $ad->user_uid)->where('course_uid', $ad->course_uid)->get()->row();

      $data_riwayat = [
        'user_uid' => $ad->user_uid,
        'user_courses_uid' => $uc->uid,
        'assesment_uid' => $ad->assesment_uid,
        'status' => '2',
        'text' => 'Menunggu Acc dari Staff'
      ];
      $this->db->insert('riwayat_asesment', $data_riwayat);
    } else {
      $error = array('error' => $this->upload->display_errors());
      var_dump($error);
      return;
    }


    redirect('user/apl02/' . $grades_uid);
  }

  private function upload_files($kode_unit, $elemen)
  {
    // if (isset($_FILES['files']['name'][$kode_unit][$elemen]) && !empty($_FILES['files']['name'][$kode_unit][$elemen][0])) {
    //   $files = $_FILES['files']['name'][$kode_unit][$elemen];

    //   foreach ($files as $key => $filename) {
    //     if (!empty($filename)) {
    //       echo "Processing file: " . $filename . "<br>";
    //       return;
    //     } else {
    //       echo 'nyasar';
    //     }
    //   }
    // } else {
    //   echo "<br>";

    //   echo "No files uploaded for $kode_unit - $elemen.";
    //   return;
    // }
    $files = $_FILES['files']['name'][$kode_unit];
    $uploaded_files = [];

    // var_dump($files);

    if (!empty(array_filter($files))) { // Checks if any non-empty file exists
      foreach ($files as $elemen_key => $file_names) { // Loop through each elemen_key (1, 2, etc.)
        foreach ($file_names as $index => $file_name) { // Loop through each file inside elemen_key
          if (empty($file_name)) {
            continue; // Skip empty file inputs
          }

          $_FILES['file_upload']['name'] = $_FILES['files']['name'][$kode_unit][$elemen_key][$index];
          $_FILES['file_upload']['type'] = $_FILES['files']['type'][$kode_unit][$elemen_key][$index];
          $_FILES['file_upload']['tmp_name'] = $_FILES['files']['tmp_name'][$kode_unit][$elemen_key][$index];
          $_FILES['file_upload']['error'] = $_FILES['files']['error'][$kode_unit][$elemen_key][$index];
          $_FILES['file_upload']['size'] = $_FILES['files']['size'][$kode_unit][$elemen_key][$index];

          $config['upload_path'] = './uploads/';
          $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
          $config['file_name'] = time() . '_' . $file_name;
          $config['overwrite'] = FALSE;

          $this->upload->initialize($config);

          if ($this->upload->do_upload('file_upload')) {
            $uploaded_files[] = $this->upload->data('file_name');
            echo "✅ Uploaded: " . $_FILES['file_upload']['name'] . "<br>";
            // echo  $_FILES['file_upload']['name'];
            // return $_FILES['file_upload']['name'];
          } else {
            // echo "❌ Upload failed for: " . $_FILES['file_upload']['name'] . " - " . $this->upload->display_errors() . "<br>";
          }
        }
      }
    } else {
      // echo "❌ No valid files uploaded for Kode Unit: $kode_unit<br>";
    }
    return $uploaded_files; // ✅ Return all uploaded file names

  }
}
