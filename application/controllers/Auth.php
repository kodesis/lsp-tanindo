<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
  }

  public function index()
  {
    $data['title'] = 'Login';
    $this->load->view('statis_template/auth_header', $data);
    $this->load->view('auth/login');
    $this->load->view('statis_template/auth_footer');
  }

  public function login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // var_dump($email, $password);
    // exit;

    // Simpan email ke dalam session jika login gagal
    $this->session->set_userdata('email', $email);

    // Cek apakah user ada
    $user = $this->User_model->get_user($email);

    if ($user) {
      if ($user->login_attempts >= 3) {
        redirect('auth/error');  // Arahkan ke halaman error jika 3 kali gagal login
      } else {
        if (password_verify($password, $user->password)) {
          // Reset login_attempts jika login berhasil
          $this->User_model->reset_login_attempts($user->uid);

          // Simpan role di session dan hapus session login_attempts
          $this->session->unset_userdata('login_attempts');
          $this->session->set_userdata([
            'user_id' => $user->uid, // untuk memanggil uid user diganti jadi user_uid
            'email' => $user->email,
            'username' => $user->full_name,
            'status' => $user->status
          ]);

          // Redirect berdasarkan status user
          switch ($user->status) {
            case '1':
              redirect('admin');
              break;
            case '2':
              redirect('staff');
              break;
            case '3':
              redirect('user');
              break;
            default:
              redirect('auth');
          }
        } else {
          // Jika password salah, tambah login_attempts
          $this->User_model->increment_login_attempts($user->uid);
          $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Invalid email or password</div>');
          redirect('auth');
        }
      }
    } else {
      $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Invalid email Input</div>');
      redirect('auth');
    }
  }

  public function reset_attempts()
  {
    // Ambil email dari session atau input
    $email = $this->session->userdata('email');

    if ($email) {
      $user = $this->User_model->get_user($email);
      if ($user) {
        // Reset login_attempts
        $this->User_model->reset_login_attempts($user->uid);
        $this->session->set_flashdata('success', '<div class="alert alert-succes" role="alert">Login attempts reset successfully. Please try logging in again.</div>');
        redirect('auth');
      } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">email not found</div>');
        redirect('auth/error');
      }
    } else {
      $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">No user data available for reset.</div>');
      redirect('auth/error');
    }
  }

  public function register_tanindo()
  {
    $data['title'] = 'Registration';
    $this->load->view('statis_template/auth_header', $data);
    $this->load->view('auth/register_tanindo');
    $this->load->view('statis_template/auth_footer');
  }

  public function process()
  {
    $this->form_validation->set_rules('full_name', 'Full Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
    $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
    $this->form_validation->set_rules('home_address', 'Home Address', 'required');
    $this->form_validation->set_rules('village', 'Village', 'required');
    $this->form_validation->set_rules('sub_district', 'Sub-district', 'required');
    $this->form_validation->set_rules('city', 'City', 'required');
    $this->form_validation->set_rules('province', 'Province', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('nationality', 'Nationality', 'required');
    $this->form_validation->set_rules('place_of_birth', 'Place of Birth', 'required');
    $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');

    // Bagian pertama dan kedua selalu REGPPP
    $bagian1 = "REG";
    $bagian2 = "PPP";

    // Ambil nilai tertinggi dari kolom 'usernumber'
    $maxUserNumber = $this->User_model->get_max_usernumber();
    $number = $maxUserNumber + 1;
    $bagian3 = sprintf("%05d", $number);

    // Ambil tahun registrasi saat ini
    $bagian4 = date("Y");

    // Gabungkan semua bagian
    $nomorRegistrasi = $bagian1 . ' ' . $bagian2 . ' ' . $bagian3 . ' ' . $bagian4;

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Registration';
      $this->load->view('statis_template/auth_header', $data);
      $this->load->view('auth/register_tanindo');
      $this->load->view('statis_template/auth_footer');
    } else {
      // Generate verification code
      $verification_code = md5(rand());

      $user_data = array(
        'full_name' => $this->input->post('full_name'),
        'email' => $this->input->post('email'),
        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
        'mobile_number' => $this->input->post('mobile_number'),
        'home_address' => $this->input->post('home_address'),
        'village' => $this->input->post('village'),
        'sub_district' => $this->input->post('sub_district'),
        'city' => $this->input->post('city'),
        'province' => $this->input->post('province'),
        'gender' => $this->input->post('gender'),
        'nationality' => $this->input->post('nationality'),
        'place_of_birth' => $this->input->post('place_of_birth'),
        'date_of_birth' => $this->input->post('date_of_birth'),
        'status' => '3',
        'verification_code' => $verification_code,
        'is_verified' => 0,
        'register_num' => $nomorRegistrasi,
        'user_number' => $bagian3,
        'years' => $bagian4
      );

      // print_r($user_data);
      // exit;

      if ($this->User_model->register($user_data)) {
        // Send verification email
        $this->send_verification_email($this->input->post('email'), $verification_code);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Registration successful! Check your email to verify your account.
        </div>');
        redirect('auth');
      }
    }
  }

  // fitur ini belom 100% work
  public function send_verification_email($email, $verification_code)
  {
    $subject = "Verify your email address";
    // $message = "Click the following link to verify your email: " . base_url() . "auth/verify/" . $verification_code;
    $message = "<p>Hi " . $email . ",</p>
    <p>Terima kasih telah mendaftar. Silakan klik tautan di bawah ini untuk memverifikasi email kamu:</p>
    <p><a href=" . base_url() . " auth/verify/" . $verification_code . ">Verifikasi Email</a></p>
    <p>Jika kamu tidak merasa mendaftar, abaikan email ini.</p>
    <p>Salam,</p>
    <p>Tim LSP Tanindo</p>";


    $this->email->from('adminlsp@lsptanindo.com', 'LSP Tanindo');
    $this->email->to($email);
    $this->email->subject($subject);
    $this->email->message($message);

    $this->email->send();
  }
  // ini belom wordk end

  // fitur ini belom 100% work
  public function verify($verification_code)
  {
    if ($this->User_model->verify_email($verification_code)) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email verified successfully!</div>');
      redirect('auth');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Invalid verification link!</div>');
      redirect('auth');
    }
  }
  // ini belom wordk end

  public function validate_captcha($response)
  {
    $secret_key = '6LeSjj8qAAAAAA2eAXchWCYwdZv-WzHVh_-f77-K';
    $verify_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key . "&response=" . $response);
    $response_data = json_decode($verify_response);
    if (!$response_data->success) {
      $this->form_validation->set_message('validate_captcha', 'Please complete the CAPTCHA');
      return false;
    } else {
      return true;
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('status'); // Hapus role dari session
    $this->session->sess_destroy(); // Hancurkan semua session
    redirect('auth');
  }

  public function forgotpassword()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confrim New Password', 'required|trim|min_length[8]|matches[new_password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Forgot Password';
      $this->load->view('statis_template/auth_header', $data);
      $this->load->view('auth/forgotpassword');
      $this->load->view('statis_template/auth_footer');
    } else {
      $email = $this->input->post('email');
      $new_password = $this->input->post('new_password1');

      // var_dump($email, $new_password);
      // exit;
      // $user = $this->db->where('email', $email)->get('users')->row_array();
      // password sudah ok
      $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

      $this->db->set('password', $password_hash);
      $this->db->where('email', $email);
      $this->db->update('users');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
      redirect('auth/index');
    }
  }

  public function error()
  {
    // Tampilkan halaman error jika user gagal login 3 kali
    $this->load->view('auth/error_page');
  }

  public function error_500()
  {
    // Tampilkan halaman error jika user gagal login 3 kali
    $this->load->view('auth/error_status');
  }
}
