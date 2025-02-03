<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('upload');
    $this->load->model('Admin_model');
    $this->load->model('Artikel_model');
    $this->load->model('User_model');
    cek_akses('1');  // Hanya admin yang dapat mengakses controller ini
  }

  // public function index()
  // {

  //   $data['title'] = 'Dashboard Admin';
  //   $data['active_menu'] = 'Admin';
  //   $this->load->view('statis_template/dashboard_header', $data);
  //   $this->load->view('statis_template/dashboard_sidebar', $data);
  //   $this->load->view('admin/dashboard', $data);
  //   $this->load->view('statis_template/dashboard_footer');
  // }

  // Contoh method lain yang juga butuh hak akses admin
  public function manage_users()
  {
    cek_akses('1');  // Periksa akses lagi jika dibutuhkan untuk method tertentu


    $data['title'] = 'Manage Staff';
    $data['active_menu'] = 'manage_users';
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('admin/manage_users');
    $this->load->view('statis_template/dashboard_footer');
  }

  public function ajax_list()
  {
    $list = $this->Admin_model->get_datatables();
    $data = array();
    $crs = "";
    $no = $_POST['start'];




    foreach ($list as $cat) {

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $cat->full_name;
      $row[] = $cat->email;
      $row[] = $cat->mobile_number;
      $row[] = $cat->home_address;

      if ($cat->status == 2) {
        $row[] = '<label type="text" class="btn btn-primary btn-rounded btn-fw btn-sm">Staff</label>';
      } else if ($cat->status == 3) {
        $row[] = '<label type="text" class="btn btn-info btn-rounded btn-fw btn-sm">Users</label>';
      }
      if ($cat->is_verified == '0'):
        $row[] = '<a href="' . base_url('admin/update_status/' . $cat->uid . '/1') . '" class="btn btn-success">Aktifkan</a>';
      else :
        $row[] = '<a href="' . base_url('admin/update_status/' . $cat->uid . '/0') . '" class="btn btn-danger">Nonaktifkan</a>';
      endif;



      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Admin_model->count_all(),
      "recordsFiltered" => $this->Admin_model->count_filtered(),
      "data" => $data,
    );
    echo json_encode($output);
  }

  public function ajax_list2()
  {
    $list = $this->Admin_model->get_datatables2();
    $data = array();
    $crs = "";
    $no = $_POST['start'];




    foreach ($list as $cat) {

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $cat->username;
      $row[] = $cat->email;
      $row[] = $cat->nomor_hp;
      $row[] = $cat->alamat;

      if ($cat->jabatan == '1') {
        $row[] = '<label type="text" class="btn btn-primary btn-rounded btn-fw btn-sm">Ketua Umum</label>';
      } elseif ($cat->jabatan == '2') {
        $row[] = '<label type="text" class="btn btn-info btn-rounded btn-fw btn-sm">Sekertariat Jendral</label>';
      } elseif ($cat->jabatan == '3') {
        $row[] = '<label type="text" class="btn btn-warning btn-rounded btn-fw btn-sm">Bendahara Umum</label>';
      } elseif ($cat->jabatan == '4') {
        $row[] = '<label type="text" class="btn btn-success btn-rounded btn-fw btn-sm">Ketua Provinsi</label>';
      } elseif ($cat->jabatan == '5') {
        $row[] = '<label type="text" class="btn btn-danger btn-rounded btn-fw btn-sm">Dep. Kelautan dan Perikanan</label>';
      } elseif ($cat->jabatan == '6') {
        $row[] = '<label type="text" class="btn btn-dark btn-rounded btn-fw btn-sm">Dep. Kemitraan Strategis dan Advokasi</label>';
      } elseif ($cat->jabatan == '7') {
        $row[] = '<label type="text" class="btn btn-light btn-rounded btn-fw btn-sm">Dep. LITBANG</label>';
      } elseif ($cat->jabatan == '8') {
        $row[] = '<label type="text" class="btn btn-secondary btn-rounded btn-fw btn-sm">Dep. Media Informasi dan Komunikasi</label>';
      } elseif ($cat->jabatan == '9') {
        $row[] = '<label type="text" class="btn btn-primary btn-rounded btn-fw btn-sm">Dep. Hukum & HAM</label>';
      } elseif ($cat->jabatan == '10') {
        $row[] = '<label type="text" class="btn btn-info btn-rounded btn-fw btn-sm">Anggota</label>';
      }




      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Admin_model->count_all2(),
      "recordsFiltered" => $this->Admin_model->count_filtered2(),
      "data" => $data,
    );
    echo json_encode($output);
  }

  public function ajax_list3()
  {
    $list = $this->Admin_model->get_datatables3();
    $data = array();
    $crs = "";
    $no = $_POST['start'];




    foreach ($list as $cat) {

      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $cat->course_name;
      $row[] = $cat->course_description;
      $row[] = $cat->course_information;
      $row[] = $cat->full_name;
      $row[] = ' <a href="' . base_url('admin/detail_course/' . $cat->uid) . '" class="btn btn-outline-secondary btn-icon-text btn-sm">Detail</a> <button type="button" class="btn btn-outline-warning btn-icon-text btn-sm" data-toggle="modal" data-target="#edit' . $cat->uid . '"><i class="typcn typcn-document btn-icon-append"></i>Edit</button>
                        <a href="' . base_url('admin/deletecourse/' . $cat->uid) . '" class="btn btn-outline-danger btn-icon-text btn-sm" onclick="return confirm("Apakah Anda yakin ingin menghapus pelatihan ini?")"><i class="typcn typcn-warning btn-icon-prepend"></i>Delete</a>';



      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Admin_model->count_all3(),
      "recordsFiltered" => $this->Admin_model->count_filtered3(),
      "data" => $data,
    );
    echo json_encode($output);
  }

  public function ajax_list4($uid)
  {
    $list = $this->Admin_model->get_datatables4($uid);
    $data = array();
    $crs = "";
    $no = $_POST['start'];




    foreach ($list as $cat) {

      $no++;
      $row = array();
      $row[] = $no;
      if ($cat->assesment_metode == 1) {
        $row[] = 'Metode DIT';
      } else if ($cat->assesment_metode == 2) {
        $row[] = 'Metode Observasi';
      } else if ($cat->assesment_metode == 3) {
        $row[] = 'Metode Portofolio';
      }
      if ($cat->tipe_assesmen == 1) {
        $row[] = 'Pra Assesmen';
      } else if ($cat->tipe_assesmen == 2) {
        $row[] = 'Uji Kompetensi';
      } else {
        $row[] = 'Belum Dipilih';
      }

      $row[] = $cat->kode_unit;
      $row[] = $cat->judul_unit_kompetensi;
      $row[] = $cat->assignments;
      if (isset($cat->file)) {
        $row[] = '<a class="btn btn-secondary btn-icon-text btn-sm" href="' . base_url('uploads/file/' . $cat->file) . '">Unduh</a>';
      } else {
        $row[] = '';
      }
      $row[] = ' <button type="button" class="btn btn-outline-warning btn-icon-text btn-sm" data-toggle="modal" data-target="#edit' . $cat->uid . '"><i class="typcn typcn-document btn-icon-append"></i>Edit</button>
                        <a href="' . base_url('admin/deleteassesmen/' . $cat->uid) . '" class="btn btn-outline-danger btn-icon-text btn-sm" onclick="return confirm("Apakah Anda yakin ingin menghapus pelatihan ini?")"><i class="typcn typcn-warning btn-icon-prepend"></i>Delete</a>';



      $data[] = $row;
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $this->Admin_model->count_all4(),
      "recordsFiltered" => $this->Admin_model->count_filtered4(),
      "data" => $data,
    );
    echo json_encode($output);
  }


  // Fungsi untuk mengupdate status user berdasarkan UID
  public function update_status($uid, $new_status)
  {
    // Pastikan status hanya bisa 'aktiv' atau 'non aktif'
    if (in_array($new_status, ['1', '0'])) {
      // Panggil model untuk update status berdasarkan uid
      $this->Admin_model->update_user_status_by_uid($uid, $new_status);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status User berhasil diubah!</div>');
    } else {
      $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Status tidak valid.</div>');
    }

    // Redirect ke halaman daftar user
    redirect('Admin/manage_users');
  }

  public function add_staff()
  {
    cek_akses('1');  // Periksa akses lagi jika dibutuhkan untuk method tertentu
    $data['title'] = 'Add Staff';
    $data['active_menu'] = 'manage_users';


    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('admin/add_staff');
    $this->load->view('statis_template/dashboard_footer');
  }

  public function process()
  {
    $this->form_validation->set_rules('full_name', 'Full Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
    $this->form_validation->set_rules('home_address', 'Home Address', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
    $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');

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
      $data['title'] = 'Add Staff';
      $this->load->view('statis_template/dashboard_header', $data);
      $this->load->view('statis_template/dashboard_sidebar', $data);
      $this->load->view('admin/add_staff');
      $this->load->view('statis_template/dashboard_footer');
    } else {
      $user_data = array(
        'full_name' => $this->input->post('full_name'),
        'email' => $this->input->post('email'),
        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
        'mobile_number' => $this->input->post('mobile_number'),
        'home_address' => $this->input->post('home_address'),
        'status' => '2',
        'is_verified' => 1,
        'register_num' => $nomorRegistrasi,
        'user_number' => $bagian3,
        'years' => $bagian4
      );
    }

    // var_dump($user_data);
    // exit;

    // untuk simpan data user staff
    $this->User_model->register($user_data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Staff Data Successfully Added please check in the table.
        </div>');
    redirect('admin/manage_users');
  }

  public function manage_artikel()
  {
    cek_akses('1');  // Periksa akses lagi jika dibutuhkan untuk method tertentu


    // Ambil data pencarian dari form
    $search = $this->input->get('search');

    // Konfigurasi paginasi
    $config = array();
    $config['base_url'] = base_url('admin/manage_artikel');
    $config['total_rows'] = $this->Artikel_model->count_all_artikel($search);
    $config['per_page'] = 10; // Jumlah data per halaman
    $config['uri_segment'] = 3; // Posisi nomor halaman di URL
    $config['reuse_query_string'] = TRUE; // Agar query string tetap ada

    // Style pagination menggunakan Bootstrap (opsional)
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close'] = '</a></li>';
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);

    // Dapatkan data user sesuai paginasi
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['data_artikel'] = $this->Artikel_model->get_artikel($config['per_page'], $page, $search);

    // Buat link paginasi
    $data['pagination'] = $this->pagination->create_links();
    $data['search'] = $search; // Mengirim nilai pencarian ke view untuk menampilkan kembali form pencarian

    $data['title'] = 'Manage Artikel';
    $data['active_menu'] = 'manage_artikel';
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('admin/manage_artikel');
    $this->load->view('statis_template/dashboard_footer');
  }

  public function add_artikel()
  {
    cek_akses('1');  // Periksa akses lagi jika dibutuhkan untuk method tertentu
    $data['title'] = 'Add Artikel';
    $data['active_menu'] = 'manage_artikel';


    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('admin/add_artikel');
    $this->load->view('statis_template/dashboard_footer');
  }
  public function update_artikel($id)
  {
    cek_akses('1');  // Periksa akses lagi jika dibutuhkan untuk method tertentu
    $data['title'] = 'Update Artikel';
    $data['active_menu'] = 'manage_artikel';

    $data['data_artikel'] = $this->Artikel_model->get_artikel_id($id);

    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('admin/update_artikel');
    $this->load->view('statis_template/dashboard_footer');
  }
  public function process_artikel()
  {
    // $this->form_validation->set_rules('thumbnail', 'Thumbnail', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Add Artikel';
      $this->load->view('statis_template/dashboard_header', $data);
      $this->load->view('statis_template/dashboard_sidebar', $data);
      $this->load->view('admin/add_artikel');
      $this->load->view('statis_template/dashboard_footer');
    } else {
      $title = $this->input->post('title');
      $config['upload_path'] = FCPATH . 'uploads/artikel/'; // Same as the config file
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['file_name'] = 'thumbnail_' . $title;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if (!$this->upload->do_upload('thumbnail')) {
        $error = $this->upload->display_errors();

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Input Data Failed. Error :' . $error . '
        </div>');
        // redirect('admin/add_artikel');
      } else {
        $image_data = $this->upload->data();
        $thumbnail = file_get_contents($image_data['full_path']);
        $image = $image_data['file_name'];

        $user_data = array(
          'thumbnail' => $image,
          'title' => $this->input->post('title'),
          'text' => $this->input->post('text'),
          'tanggal' => $this->input->post('tanggal'),
          'view_count' => 0,
        );
        $this->Artikel_model->save($user_data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Input Data Successfully Added please check in the table.
        </div>');
        redirect('admin/manage_artikel');
      }
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Input Data Failed
        </div>');
      // redirect('admin/add_artikel');
      // var_dump($user_data);
      // exit;

      // untuk simpan data user staff

    }
  }
  public function process_update_artikel()
  {
    $title = $this->input->post('title');
    $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    $data_update = [
      'title'      => $title,
      'text' => $this->input->post('text'),
      'tanggal' => $this->input->post('tanggal'),
    ];

    echo $this->input->post('tanggal');
    $config['upload_path'] = FCPATH . 'uploads/artikel/'; // Same as the config file
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['file_name'] = 'thumbnail_' . $title;


    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ($this->upload->do_upload('thumbnail')) {
      $image_data = $this->upload->data();
      $imgdata = file_get_contents($image_data['full_path']);
      $thumbnail = $image_data['file_name'];
      $data_update['thumbnail'] = $thumbnail;
    }

    $this->Artikel_model->update($data_update, array('Id' => $this->input->post('id_edit')));
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Update Data Successfully Added please check in the table.
        </div>');
    redirect('admin/manage_artikel');
  }

  public function delete_artikel($id)
  {
    $this->Artikel_model->delete(array('Id' => $id));

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Delete Data Successfully Added please check in the table.
        </div>');
    redirect('admin/manage_artikel');
  }



  public function manage_course()
  {
    cek_akses('1');  // Periksa akses lagi jika dibutuhkan untuk method tertentu

    $data['course'] = $this->Admin_model->get_all_pelatihan(); // Dapatkan semua pelatihan/ course
    $data['users'] = $this->Admin_model->get_all_pelatih(); // Dapatkan semua staff untuk dropdown

    $data['title'] = 'Manage Course';
    $data['active_menu'] = 'manage_course';
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('admin/manage_course');
    $this->load->view('statis_template/dashboard_footer');
  }
  public function detail_course($uid)
  {
    $data['assesmen'] = $this->Admin_model->get_all_assesmen($uid); // Dapatkan semua pelatihan/ course

    $data['title'] = 'Detail Course';
    $data['active_menu'] = 'manage_course';
    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('admin/detail_course');
    $this->load->view('statis_template/dashboard_footer');
  }

  // Fungsi untuk menambahkan pelatihan baru
  public function addcourse()
  {
    cek_akses('1');  // Periksa akses lagi jika dibutuhkan untuk method tertentu
    $data['title'] = 'Add Course';
    $data['active_menu'] = 'manage_course';

    $data = array(
      'course_name' => $this->input->post('course_name'),
      'teacher_uid' => $this->input->post('teacher_uid'),
      'course_description' => $this->input->post('course_description'),
      'course_information' => $this->input->post('course_information')
    );
    $this->Admin_model->insert_pelatihan($data);
    redirect('admin/manage_course');
  }

  // Fungsi untuk mengedit pelatihan
  public function editcourse($uid)
  {
    $data['course'] = $this->Admin_model->get_pelatihan_by_id($uid);
    $data['users'] = $this->Admin_model->get_all_pelatih(); // Dapatkan pelatih untuk dropdown
    $this->load->view('admin/manage_course', $data);
  }

  // Fungsi untuk mengupdate pelatihan
  public function updatecourse($uid)
  {
    $data = array(
      // 'courses_uid' => $this->input->post($uid),
      'course_name' => $this->input->post('course_name'),
      'course_description' => $this->input->post('course_description'),
      'course_information' => $this->input->post('course_information'),
      'teacher_uid' => $this->input->post('teacher_uid')
    );

    // print_r($data);
    // exit;
    $this->Admin_model->update_pelatihan($uid, $data);
    redirect('admin/manage_course');
  }

  // Fungsi untuk menghapus pelatihan
  public function deletecourse($uid)
  {
    $this->Admin_model->delete_pelatihan($uid);
    redirect('admin/manage_course');
  }

  public function add_course()
  {
    cek_akses('1');  // Periksa akses lagi jika dibutuhkan untuk method tertentu
    $data['title'] = 'Add Course';
    $data['active_menu'] = 'manage_course';

    $data['users'] = $this->Admin_model->get_all_pelatih(); // Dapatkan pelatih untuk dropdown

    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('admin/add_course');
    $this->load->view('statis_template/dashboard_footer');
  }

  public function add_assesmen()
  {
    cek_akses('1');  // Periksa akses lagi jika dibutuhkan untuk method tertentu
    $data['title'] = 'Add Assesmen';
    $data['active_menu'] = 'manage_assesmen';

    // $data['users'] = $this->Admin_model->get_all_pelatih(); // Dapatkan pelatih untuk dropdown

    $this->load->view('statis_template/dashboard_header', $data);
    $this->load->view('statis_template/dashboard_sidebar', $data);
    $this->load->view('admin/add_assesmen');
    $this->load->view('statis_template/dashboard_footer');
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

  public function export_excel()
  {
    // Load PHPExcel library
    require 'application/libraries/PHPExcel.php';

    $excel = new PHPExcel();

    // Set properties
    $excel->getProperties()->setCreator('Your Name')
      ->setLastModifiedBy('Your Name')
      ->setTitle('User Report')
      ->setSubject('User Report')
      ->setDescription('Report generated for users with courses.');

    // Add header
    $excel->setActiveSheetIndex(0)
      ->setCellValue('A1', 'No')
      ->setCellValue('B1', 'Nomor Register')
      ->setCellValue('C1', 'Username')
      ->setCellValue('D1', 'Email')
      ->setCellValue('E1', 'Address')
      ->setCellValue('F1', 'City')
      ->setCellValue('G1', 'Province')
      ->setCellValue('H1', 'Date of Birth')
      ->setCellValue('I1', 'Course')
      ->setCellValue('J1', 'Status');

    // Ambil data dari model
    $users = $this->Admin_model->get_data_report();

    // Isi data
    $row = 2;
    $no = 1;
    foreach ($users as $user) {
      $status = ($user['status'] == 1) ? 'Lulus' : 'Tidak Lulus';

      $excel->setActiveSheetIndex(0)
        ->setCellValue('A' . $row, $no++)
        ->setCellValue('B' . $row, $user['register_num'])
        ->setCellValue('C' . $row, $user['full_name'])
        ->setCellValue('D' . $row, $user['email'])
        ->setCellValue('E' . $row, $user['home_address'])
        ->setCellValue('F' . $row, $user['city'])
        ->setCellValue('G' . $row, $user['province'])
        ->setCellValue('H' . $row, $user['date_of_birth'])
        ->setCellValue('I' . $row, $user['course_name'])
        ->setCellValue('J' . $row, $status);
      $row++;
    }

    // Rename sheet
    $excel->getActiveSheet()->setTitle('User Report');

    // Set active sheet index to the first sheet
    $excel->setActiveSheetIndex(0);

    // Buat file Excel
    $filename = 'User_Report.xls';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $writer->save('php://output');
  }



  public function export_excel_ktna()
  {
    // Load PHPExcel library
    require 'application/libraries/PHPExcel.php';

    $excel = new PHPExcel();

    // Set properties
    $excel->getProperties()->setCreator('Your Name')
      ->setLastModifiedBy('Your Name')
      ->setTitle('User Report')
      ->setSubject('User Report')
      ->setDescription('Report generated for users with courses.');

    // Add header
    $excel->setActiveSheetIndex(0)
      ->setCellValue('A1', 'No')
      ->setCellValue('B1', 'NIK')
      ->setCellValue('C1', 'Username')
      ->setCellValue('D1', 'Email')
      ->setCellValue('E1', 'Address')
      ->setCellValue('F1', 'City')
      ->setCellValue('G1', 'Province')
      ->setCellValue('H1', 'Date of Birth')
      ->setCellValue('I1', 'Course')
      ->setCellValue('J1', 'Jabatan');

    // Ambil data dari model
    $users = $this->Admin_model->get_data_report_ktna();

    // Isi data
    $row = 2;
    $no = 1;
    foreach ($users as $user) {
      $status = ($user['jabatan'] == 1) ? 'Lulus' : 'Tidak Lulus';

      $excel->setActiveSheetIndex(0)
        ->setCellValue('A' . $row, $no++)
        ->setCellValue('B' . $row, $user['NIK'])
        ->setCellValue('C' . $row, $user['username'])
        ->setCellValue('D' . $row, $user['email'])
        ->setCellValue('E' . $row, $user['alamat'])
        ->setCellValue('F' . $row, $user['tem_lahir'])
        ->setCellValue('G' . $row, $user['provinsi'])
        ->setCellValue('H' . $row, $user['tanggal_lahir'])
        ->setCellValue('I' . $row, $user['course_name'])
        ->setCellValue('J' . $row,);
      $row++;
    }

    // Rename sheet
    $excel->getActiveSheet()->setTitle('User Report');

    // Set active sheet index to the first sheet
    $excel->setActiveSheetIndex(0);

    // Buat file Excel
    $filename = 'User_Report.xls';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $writer->save('php://output');
  }

  public function process_course()
  {
    $data = array(
      'course_name' => $this->input->post('course_name'),
      'course_description' => $this->input->post('course_description'),
      'teacher_uid' => $this->input->post('pelatih_id'),
    );
    if ($this->db->insert('courses', $data)) {
      $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data assessment berhasil disimpan.</div>');
      redirect('admin/manage_course');
    } else {
      // Jika gagal
      $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat menyimpan data.<?div>');
      redirect('admin/manage_course');
    }
  }

  public function process_assesmen($id)
  {
    $data = array(
      'course_uid' => $id,
      'assesment_metode' => $this->input->post('assesment_metode'),
      'tipe_assesmen' => $this->input->post('tipe_assesmen'),
      'kode_unit' => $this->input->post('kode_unit'),
      'judul_unit_kompetensi' => $this->input->post('judul_unit_kompetensi'),
      'assignments' => $this->input->post('assignments'),
    );
    $config['upload_path'] = FCPATH . 'uploads/file/'; // Ensure this directory exists
    $config['allowed_types'] = 'pdf|doc|docx';
    $config['file_name'] = 'file_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $this->input->post('assignments'));

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ($this->upload->do_upload('file')) {
      $image_data = $this->upload->data();
      $file = $image_data['file_name'];
      $data['file'] = $file; // Add uploaded file to $data
    }

    if ($this->db->insert('assesmen', $data)) {
      $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Data assessment berhasil disimpan.</div>');
      redirect('admin/detail_course/' . $id);
    } else {
      // Jika gagal
      $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat menyimpan data.<?div>');
      redirect('admin/detail_course/' . $id);
    }
  }

  public function updateassesmen($uid)
  {
    $data = array(
      'assesment_metode' => $this->input->post('assesment_metode'),
      'tipe_assesmen' => $this->input->post('tipe_assesmen'),
      'kode_unit' => $this->input->post('kode_unit'),
      'judul_unit_kompetensi' => $this->input->post('judul_unit_kompetensi'),
      'assignments' => $this->input->post('assignments'),
    );

    $config['upload_path'] = FCPATH . 'uploads/file/'; // Ensure this directory exists
    $config['allowed_types'] = 'pdf|doc|docx';
    $config['file_name'] = 'file_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $this->input->post('assignments'));

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ($this->upload->do_upload('file')) {
      $image_data = $this->upload->data();
      $file = $image_data['file_name'];
      $data['file'] = $file; // Add uploaded file to $data
    }

    // print_r($data); // Debug the final $data array
    // exit;

    $this->Admin_model->update_assesmen($uid, $data); // Save to database
    redirect('admin/detail_course/' . $uid);
  }
  public function deleteassesmen($uid)
  {
    $this->Admin_model->delete_assesmen($uid);
    redirect('admin/manage_course');
  }
}
