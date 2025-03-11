<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Staff_model');
    cek_akses('2');  // Hanya staff yang dapat mengakses controller ini
  }

  // public function index()
  // {
  //   $data['title'] = 'Dashboard Staff';
  //   $data['active_menu'] = 'Staff'; // nanti ganti jadi username 
  //   $this->load->view('statis_template/dashboard_header', $data);
  //   $this->load->view('statis_template/dashboard_sidebar', $data);
  //   $this->load->view('staff/dashboard');
  //   $this->load->view('statis_template/dashboard_footer');
  // }

  public function manage_assesment()
  {
    // Ambil ID mentor dari session
    $mentor_id = $this->session->userdata('user_id');

    // Ambil data kursus berdasarkan mentor_id
    $data['user_courses'] = $this->Staff_model->get_user_courses($mentor_id);

    $data['title'] = 'Data Assesment';
    $data['active_menu'] = 'manage_assesment'; // nanti ganti jadi username 
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('staff/manage_assesment');
    $this->load->view('statis_template/dashboard_footer');
  }

  public function metode_dit($uid)
  {
    $user_course = $this->db->from('user_courses')->where('uid', $uid)->get()->row();

    $data['assesment'] = $this->Staff_model->get_metode_dit($user_course->course_uid);
    $data['username'] = $this->Staff_model->get_user_name($uid);
    // $data['checklist'] = $this->Staff_model->get_status_assesment($uid);

    // exit;
    $data['title'] = 'Metode Penilaian DIT';
    $data['active_menu'] = 'metode_dit'; // nanti ganti jadi username 
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('staff/metode_dit');
    $this->load->view('statis_template/dashboard_footer');
  }

  public function obser($uid)
  {
    $user_course = $this->db->from('user_courses')->where('uid', $uid)->get()->row();

    $data['assesment'] = $this->Staff_model->get_metode_obser($user_course->course_uid);
    $data['username'] = $this->Staff_model->get_user_name($uid);
    // $data['checklist'] = $this->Staff_model->get_status_assesment($uid);

    $data['title'] = 'Metode Penilaian Observasi';
    $data['active_menu'] = 'obser'; // nanti ganti jadi username 
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('staff/obser');
    $this->load->view('statis_template/dashboard_footer');
  }

  public function port($uid)
  {
    $user_course = $this->db->from('user_courses')->where('uid', $uid)->get()->row();
    $data['assesment'] = $this->Staff_model->get_metode_port($user_course->course_uid);
    $data['username'] = $this->Staff_model->get_user_name($uid);
    // $data['checklist'] = $this->Staff_model->get_status_assesment($uid);

    $data['title'] = 'Metode Penilaian Portofolio';
    $data['active_menu'] = 'port'; // nanti ganti jadi username 
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('staff/port');
    $this->load->view('statis_template/dashboard_footer');
  }

  public function saveassesmen()
  {
    // print_r($_POST);
    // exit;
    // Ambil data dari form
    $user_uid = $this->input->post('user_uid');
    // $assessments = $this->input->post('assessment');
    $selectedCheckboxes = json_decode($this->input->post('selectedCheckboxes'), true);
    $statuses = $this->input->post('status');

    if ($selectedCheckboxes) {

      $data = [];
      // print_r($data);
      // exit;
      foreach ($selectedCheckboxes as $assessments) {
        $assessment_uid = $assessments;
        // $status = 1;

        $cek_assesment = $this->Staff_model->check_assesmen($user_uid, $assessment_uid);
        if ($cek_assesment == null) {
          $data[] = [
            'user_uid' => $user_uid,
            'assesment_uid' => $assessment_uid,
            'status' => '1'
          ];
        }
      }
      // Insert batch data to database

      // for ($i = 0; $i < count($statuses); $i++) {
      //   $assessment_uid = $assessments[$i];
      //   $status = $statuses[$i];

      //   $data[] = [
      //     'user_uid' => $user_uid,
      //     'assesment_uid' => $assessment_uid,
      //     'status' => $status
      //   ];
      // }

      // echo '<pre>';
      // print_r($data);
      // echo '</pre>';
      // exit;
      // Simpan ke database
      if (!empty($data)) {
        if ($this->Staff_model->save_assessment($data)) {
          // $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data assessment berhasil disimpan.</div>');
          echo json_encode(array("status" => 'success'));
          return;
        } else {
          // $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat menyimpan data.<?div>');

          $error = $this->upload->display_errors();
          echo json_encode(array("status" => FALSE, "error" => $error));
          return;
        }
      } else {
        // Handle case where no new assessments were found
        echo json_encode(['status' => 'nothing_to_insert']);
        return;
      }
    } else {
      // $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Tidak ada data assessment yang disubmit.</div>');
      echo json_encode(['status' => 'no_assessments_selected']);
      return;
    }
    // echo json_encod
    // $error = $this->upload->display_errors();
    // echo json_encode(array("status" => FALSE, "error" => $error));

    // redirect('staff/manage_assesment');
  }

  // public function detail_assesmen($uid)
  // {
  //   $data['soal'] = $this->Staff_model->get_detail_assesmen($uid);
  //   $data['username'] = $this->Staff_model->get_user_name($uid);
  //   // $data['checklist'] = $this->Staff_model->get_status_assesment($uid);

  //   // exit;
  //   $data['title'] = 'Detail Assesmen';
  //   $data['active_menu'] = 'metode_dit'; // nanti ganti jadi username 
  //   $this->load->view('statis_template/dashboard_header', $data);
  //   $this->load->view('statis_template/dashboard_sidebar', $data);
  //   $this->load->view('staff/detail_assesment');
  //   $this->load->view('statis_template/dashboard_footer');
  // }

  public function status_kelulusan($uid)
  {
    $status = $this->input->post('status');
    $user_uid = $this->input->post('user_uid');
    $user_course = $uid;

    // buat query untuk update datanya
    $data = [
      'user_uid' => $user_uid,
      'status' => $status,
      'uid' => $user_course
    ];

    // buat pengkondisian untuk mencek apakah data sudah ada atau kosong jika kosong maka langsung insert
    // Panggil model untuk menyimpan atau memperbaharui status
    if ($this->Staff_model->save_status($data)) {
      $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data assessment berhasil disimpan.</div>');
      redirect('staff/manage_assesment');
    } else {
      // Jika gagal
      $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat menyimpan data.<?div>');
      redirect('staff/manage_assesment');
    }
  }

  public function profil()
  {
    $data['users'] = $this->User_model->get_user($this->session->userdata('email'));
    $data['user_doc'] = $this->db->get_where('documents', ['user_uid' => $this->session->userdata('user_id')])->row_array();

    $data['title'] = 'Profil';
    $data['active_menu'] = 'Profil'; // nanti ganti jadi username
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('staff/profil');
    $this->load->view('statis_template/dashboard_footer');
  }

  public function save_soal($uid)
  {
    $title = $this->input->post('soal');
    $config['upload_path'] = FCPATH . 'uploads/detail_assesmen/'; // Same as the config file
    $config['allowed_types'] = 'docx|word|pdf';
    $config['file_name'] = 'file_soal_' . $title;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('file_soal')) {
      $error = $this->upload->display_errors();

      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Input Data Failed. Error :' . $error . '
        </div>');
      // redirect('admin/add_artikel');
    } else {
      $image_data = $this->upload->data();
      $thumbnail = file_get_contents($image_data['full_path']);
      $image = $image_data['file_name'];

      $data = array(
        'uid_assesmen' => $uid,
        'soal' => $this->input->post('soal'),
        'file_soal' => $image,
      );
      if ($this->db->insert('detail_assesmen', $data)) {
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data assessment berhasil disimpan.</div>');
        redirect('staff/detail_assesmen/' . $uid);
      } else {
        // Jika gagal
        $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat menyimpan data.<?div>');
        redirect('staff/detail_assesmen/' . $uid);
      }
    }
  }
  public function hapus_detail_assesmen($id_assesmen, $uid)
  {
    $this->Staff_model->delete_detail_assesmen($uid);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Delete Data Successfully Added please check in the table.
        </div>');
    redirect('staff/detail_assesmen/' . $id_assesmen);
  }
  public function jawaban_assesi($user_uid, $course_uid)
  {
    $data['data_assessor'] = $this->User_model->get_data_assessor($course_uid);
    $data['data_assesmen_pra_assesmen'] = $this->User_model->get_data_assesmen_pra_assesmen_staff($user_uid, $course_uid);
    $data['data_assesmen_uji_kompetensi'] = $this->User_model->get_data_assesmen_uji_kompetensi_staff($user_uid, $course_uid);
    $data['username'] = $this->Staff_model->get_user_name($user_uid);
    // $data['checklist'] = $this->Staff_model->get_status_assesment($uid);

    // exit;
    $data['title'] = 'Metode Penilaian DIT';
    $data['active_menu'] = 'metode_dit'; // nanti ganti jadi username 
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('staff/jawaban_assesi');
    $this->load->view('statis_template/dashboard_footer');
  }
  public function detail_assesmen($uid)
  {
    $data['data_soal'] = $this->User_model->get_data_detail_assesmen($uid);

    $data['title'] = 'Assesmen User';
    $data['active_menu'] = 'User'; // nanti ganti jadi username
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('staff/detail_assesmen');
    $this->load->view('statis_template/dashboard_footer');
  }
  public function save_rekomendasi($id_user)
  {
    $id = $this->input->post('id_assesmen');
    $alasan = $this->input->post('alasan');

    $data_update = [
      'status' => 3,
      'correct' => $this->input->post('correct'),
      'alasan' => $alasan,
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

    $folderPath = FCPATH . "uploads/tanda_tangan/asesor/"; // Full path to the folder

    // Ensure the directory exists
    if (!is_dir($folderPath)) {
      mkdir($folderPath, 0777, true);
      echo ('nyasar');
    }
    $signatureData = $this->input->post('signed2'); // Get Base64 signature
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

      $data_update['signature'] = $fileName;
      echo ('nyasar');
    } else {
      $error = array('error' => $this->upload->display_errors());
      echo ('nyasar di error');
      echo ($this->upload->display_errors());
      return;
    }

    // echo ($id);
    // $assesmen = $this->User_model->get_data_detail_assesmen_uid($id);
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


    redirect('staff/jawaban_assesi/' . $id_user . '/' . $this->input->post('course_uid'));
  }
}
