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
    $data['assesment'] = $this->Staff_model->get_metode_dit();
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
    $data['assesment'] = $this->Staff_model->get_metode_obser();
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
    $data['assesment'] = $this->Staff_model->get_metode_port();
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
    $assessments = $this->input->post('assessment');
    $statuses = $this->input->post('status');

    if (is_array($statuses)) {

      $data = [];
      // print_r($data);
      // exit;

      for ($i = 0; $i < count($statuses); $i++) {
        $assessment_uid = $assessments[$i];
        $status = $statuses[$i];

        $data[] = [
          'user_uid' => $user_uid,
          'assesment_uid' => $assessment_uid,
          'status' => $status
        ];
      }

      // echo '<pre>';
      // print_r($data);
      // echo '</pre>';
      // exit;
      // Simpan ke database
      if ($this->Staff_model->save_assessment($data)) {
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data assessment berhasil disimpan.</div>');
      } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat menyimpan data.<?div>');
      }
    } else {
      $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Tidak ada data assessment yang disubmit.</div>');
    }

    redirect('staff/manage_assesment');
  }

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
}
