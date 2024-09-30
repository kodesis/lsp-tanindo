<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Home_model');
  }

  public function index()
  {
    $data['title'] = 'Pertanian';
    $this->load->view('statis_template/v_header', $data);
    $this->load->view('home/index');
    $this->load->view('statis_template/v_footer');
  }

  public function skema()
  {
    $data['title'] = 'Skema Program Tanindo';
    $this->load->view('statis_template/v_header', $data);
    $this->load->view('home/skema');
    $this->load->view('statis_template/v_footer');
  }

  public function fasilitator()
  {
    $data['title'] = 'Skema Program Fasilitator Tanindo';
    $this->load->view('statis_template/v_header', $data);
    $this->load->view('home/fasilitator');
    $this->load->view('statis_template/v_footer');
  }

  public function supervisor()
  {
    $data['title'] = 'Skema Program Supervisor Tanindo';
    $this->load->view('statis_template/v_header', $data);
    $this->load->view('home/supervisor');
    $this->load->view('statis_template/v_footer');
  }

  public function regisktna()
  {
    $data['title'] = 'Register KTNA';
    $this->load->view('statis_template/auth_header', $data);
    $this->load->view('home/regisktna');
    $this->load->view('statis_template/auth_footer');
  }

  public function insertktna()
  {
    $this->form_validation->set_rules('nik', 'Nik', 'required|trim|is_unique[user_ktna.nik]');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user_ktna.email]');
    $this->form_validation->set_rules('tem_lahir', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('tahun_lahir', 'Tahun_Lahir', 'required|trim');
    $this->form_validation->set_rules('bulan_lahir', 'Bulan_Lahir', 'required|trim');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
    $this->form_validation->set_rules('nomor_hp', 'Nomor Hp', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Register KTNA';
      $this->load->view('statis_template/auth_header', $data);
      $this->load->view('home/regisktna');
      $this->load->view('statis_template/auth_footer');
    } else {
      $nik = $this->input->post('nik');
      $username = $this->input->post('username');
      $email = $this->input->post('email');
      $tem_lahir = $this->input->post('tem_lahir');
      $tahun_lahir = $this->input->post('tahun_lahir');
      $bulan_lahir = $this->input->post('bulan_lahir');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $jabatan = $this->input->post('jabatan');
      $alamat = $this->input->post('alamat');
      $provinsi = $this->input->post('provinsi');
      $nomor_hp = $this->input->post('nomor_hp');
      $full_date_lahir = $tahun_lahir . '-' . str_pad($bulan_lahir, 2, '0', STR_PAD_LEFT) . '-' . str_pad($tanggal_lahir, 2, '0', STR_PAD_LEFT);

      // Mengambil data foto dari input dan decoding dari base64
      $foto = $this->input->post('image');
      $foto = str_replace('data:image/jpeg;base64,', '', $foto);
      $foto = base64_decode($foto, true);

      // var_dump($foto);
      // exit;

      // Mengambil username untuk penamaan file foto
      $username = $this->input->post('username');
      $nama_foto = 'masuk-' . date('Y-m-d-H-i-s') . '-' . $username . '.png';
      $file_path = FCPATH . 'assets/images/profile/' . $nama_foto;

      // Memastikan direktori tujuan ada dan memiliki izin yang tepat
      if (!is_dir(FCPATH . 'assets/images/profile/')) {
        mkdir(FCPATH . 'assets/images/profile/', 0777, true);
      }

      // Menyimpan file foto dan mengatur pesan flashdata
      if (file_put_contents($file_path, $foto)) {
        $this->session->set_flashdata('message_name', 'Presensi masuk berhasil disimpan');
      } else {
        $this->session->set_flashdata('message_error', 'Gagal menyimpan foto presensi masuk');
        redirect($_SERVER['HTTP_REFERER']);
        return;
      }

      // query mengambil urutan terbesar 
      $nomor = $this->Home_model->get_nomor();
      $number = $nomor['max'] + 1;
      $no_urut = sprintf("%06d", $number);
      $nomor_user = "$provinsi-00-$no_urut";

      $data_insert = array(
        'nik' => $nik,
        'username' => $username,
        'email' => $email,
        'nomor_urut' => $nomor_user,
        'nomor' => $no_urut,
        'jabatan' => $jabatan,
        'tem_lahir' => $tem_lahir,
        'tanggal_lahir' => $full_date_lahir,
        'alamat' => $alamat,
        'provinsi' => $provinsi,
        'nomor_hp' => $nomor_hp,
        'image' => $nama_foto
      );

      // var_dump($data_insert);
      // exit;

      if ($this->db->insert('user_ktna', $data_insert)) {
        // kirim email
        $this->send_verification_email($email);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Validasi Berhasil & Data berhasil Tersimpan!! silahkan login
        </div>');
        redirect('home');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Apakah Kamu Robot ??
        </div>');
        redirect('home/regisktna');
      }
    }
  }
  public function send_verification_email($email)
  {
    $subject = "Verify your email address";
    $message = "<p>Hi " . $email . ",</p>
    <p>Terima kasih telah mendaftar. Silakan klik tautan di bawah ini untuk memverifikasi email kamu:</p>
    <p>Jika kamu tidak merasa mendaftar, abaikan email ini.</p>
    <p>Salam,</p>
    <p>Tim LSP Tanindo KTNA</p>";


    $this->email->from('adminlsp@lsptanindo.com', 'LSP Tanindo KTNA');
    $this->email->to($email);
    $this->email->subject($subject);
    $this->email->message($message);

    $this->email->send();
  }
}
