<?php
class Admin_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  var $table = 'users';
  var $column_order = array('users.uid', 'full_name', 'email', 'mobile_number', 'home_address', 'status', 'is_verified'); //set column field database for datatable orderable
  var $column_search = array('users.uid', 'full_name', 'email', 'mobile_number', 'home_address', 'status', 'is_verified'); //set column field database for datatable searchable 
  var $order = array('users.uid' => 'asc'); // default order 

  function _get_datatables_query()
  {

    $this->db->select('users.*');
    $this->db->from('users');
    $this->db->where('users.status >', 1);
    $i = 0;

    foreach ($this->column_search as $item) // loop column 
    {
      if ($_POST['search']['value']) // if datatable send POST for search
      {

        if ($i === 0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if (isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables()
  {
    $this->_get_datatables_query();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  function count_all()
  {

    $this->_get_datatables_query();
    $query = $this->db->get();

    return $this->db->count_all_results();
  }


  var $table2 = 'user_ktna';
  var $column_order2 = array('user_ktna.uid', 'username', 'email', 'nomor_hp', 'alamat', 'jabatan'); //set column field database for datatable orderable
  var $column_search2 = array('user_ktna.uid', 'username', 'email', 'nomor_hp', 'alamat', 'jabatan'); //set column field database for datatable searchable 
  var $order2 = array('user_ktna.uid' => 'asc'); // default order 

  function _get_datatables_query2()
  {

    $this->db->select('user_ktna.*');
    $this->db->from('user_ktna');
    // $this->db->where('user_ktna.status >', 1);
    $i = 0;

    foreach ($this->column_search2 as $item) // loop column 
    {
      if ($_POST['search']['value']) // if datatable send POST for search
      {

        if ($i === 0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search2) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if (isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order2;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables2()
  {
    $this->_get_datatables_query2();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered2()
  {
    $this->_get_datatables_query2();
    $query = $this->db->get();
    return $query->num_rows();
  }

  function count_all2()
  {

    $this->_get_datatables_query2();
    $query = $this->db->get();

    return $this->db->count_all_results();
  }

  var $table3 = 'courses';
  var $column_order3 = array('courses.uid', 'course_name', 'course_description', 'course_information', 'full_name'); //set column field database for datatable orderable
  var $column_search3 = array('courses.uid', 'course_name', 'course_description', 'course_information', 'full_name'); //set column field database for datatable searchable 
  var $order3 = array('courses.uid' => 'asc'); // default order 

  function _get_datatables_query3()
  {
    $this->db->select('courses.*, users.full_name');
    $this->db->from('courses');
    $this->db->join('users', 'courses.teacher_uid = users.uid');
    $i = 0;

    foreach ($this->column_search3 as $item) // loop column 
    {
      if ($_POST['search']['value']) // if datatable send POST for search
      {

        if ($i === 0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search3) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if (isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order3;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables3()
  {
    $this->_get_datatables_query3();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered3()
  {
    $this->_get_datatables_query3();
    $query = $this->db->get();
    return $query->num_rows();
  }

  function count_all3()
  {

    $this->_get_datatables_query3();
    $query = $this->db->get();

    return $this->db->count_all_results();
  }


  var $table4 = 'assesmen';
  var $column_order4 = array('assesmen.uid', 'assesment_metode', 'tipe_assesmen', 'kode_unit', 'judul_unit_kompetensi', 'rekomendasi', 'assignments', 'file'); //set column field database for datatable orderable
  var $column_search4 = array('assesmen.uid', 'assesment_metode', 'tipe_assesmen', 'kode_unit', 'judul_unit_kompetensi', 'rekomendasi', 'assignments', 'file'); //set column field database for datatable searchable 
  var $order4 = array('assesmen.uid' => 'asc', 'assesmen.rekomendasi' => 'DESC'); // default order 

  function _get_datatables_query4()
  {
    $this->db->select('assesmen.*');
    $this->db->from('assesmen');
    $this->db->where('course_uid', $this->uri->segment(3));
    $i = 0;

    foreach ($this->column_search4 as $item) // loop column 
    {
      if ($_POST['search']['value']) // if datatable send POST for search
      {

        if ($i === 0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search4) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if (isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order4[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order4;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables4()
  {
    $this->_get_datatables_query4();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered4()
  {
    $this->_get_datatables_query4();
    $query = $this->db->get();
    return $query->num_rows();
  }

  function count_all4()
  {

    $this->_get_datatables_query4();
    $query = $this->db->get();

    return $this->db->count_all_results();
  }

  // Fungsi untuk mendapatkan user dengan paginasi dan pencarian
  public function get_users($limit, $start, $search = '')
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('status !=', 1);  // Kondisi status tidak sama dengan 1

    // Jika ada pencarian, tambahkan kondisi pencarian
    if ($search != '') {
      $this->db->like('full_name', $search);
      $this->db->or_like('email', $search);
      $this->db->or_like('mobile_number', $search);  // Asumsikan ada kolom mobile_number
    }

    $this->db->limit($limit, $start); // Paginasi
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_user_ktna($limit, $start, $search = '')
  {
    $this->db->select('*');
    $this->db->from('user_ktna');
    // $this->db->where('status !=', 1);  // Kondisi status tidak sama dengan 1

    // Jika ada pencarian, tambahkan kondisi pencarian
    // if ($search != '') {
    //   $this->db->like('full_name', $search);
    //   $this->db->or_like('email', $search);
    //   $this->db->or_like('mobile_number', $search);  // Asumsikan ada kolom mobile_number
    // }

    $this->db->limit($limit, $start); // Paginasi
    $query = $this->db->get();
    return $query->result_array();
  }
  // Fungsi untuk menghitung total user (dengan atau tanpa pencarian)
  public function count_all_users($search = '')
  {
    $this->db->from('users');
    $this->db->where('status !=', 1);  // Kondisi status tidak sama dengan 1

    // Jika ada pencarian, tambahkan kondisi pencarian
    if ($search != '') {
      $this->db->like('full_name', $search);
      $this->db->or_like('email', $search);
      $this->db->or_like('mobile_number', $search);  // Asumsikan ada kolom mobile_number
    }

    return $this->db->count_all_results();
  }

  // Fungsi untuk mengupdate status user berdasarkan UID
  public function update_user_status_by_uid($uid, $new_status)
  {
    $this->db->where('uid', $uid);
    $this->db->update('users', ['is_verified' => $new_status]);
  }

  // Dapatkan semua pelatih
  public function get_all_pelatih()
  {
    $query = $this->db->where('status =', 2)->get('users');
    return $query->result_array();
  }

  // Dapatkan semua pelatihan dengan join ke tabel pelatih
  public function get_all_pelatihan()
  {
    $this->db->select('courses.*, users.full_name');
    $this->db->from('courses');
    $this->db->join('users', 'courses.teacher_uid = users.uid');
    $this->db->where('users.status =', 2);
    $this->db->order_by('courses.uid', 'asc');
    $query = $this->db->get();
    return $query->result_array();

    // query untuk mengambil seluruh data dari tabel courses mentor agar 1 mentor bisa banyak kursus dan sebaliknya
    // $this->db->select('c.*, u.full_name');
    // $this->db->from('courses c');
    // $this->db->join('courses_mentor cm', 'c.uid = cm.courses_uid');
    // $this->db->join('users u', 'cm.mentor_uid = u.uid');
    // $this->db->where('u.status =', 2);
    // $query = $this->db->get();
    // return $query->result_array();
  }

  // Insert data pelatihan baru
  public function insert_pelatihan($data)
  {
    $this->db->insert('courses', $data);
  }

  // Dapatkan pelatihan berdasarkan ID
  public function get_pelatihan_by_id($id)
  {
    $this->db->select('courses.*, users.full_name');
    $this->db->from('courses');
    $this->db->join('users', 'courses.teacher_uid = users.uid');
    $this->db->where('courses.uid', $id);
    $query = $this->db->get();
    return $query->row();
  }

  // Update pelatihan berdasarkan ID
  public function update_pelatihan($id, $data)
  {
    $this->db->where('uid', $id);
    $this->db->update('courses', $data);
  }

  // Hapus pelatihan berdasarkan ID
  public function delete_pelatihan($id)
  {
    $this->db->where('uid', $id);
    $this->db->delete('courses');
  }

  public function get_data_report()
  {
    $this->db->select('u.*,uc.course_uid,uc.status,cs.course_name');
    $this->db->from('users u');
    $this->db->join('user_courses uc', 'uc.user_uid = u.uid');
    $this->db->join('courses cs', 'uc.course_uid = cs.uid');
    $this->db->where('u.status', 3);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_data_report_ktna()
  {
    $this->db->select('u.*,uc.course_uid,uc.status,cs.course_name');
    $this->db->from('user_ktna u');
    $this->db->join('user_courses uc', 'uc.user_uid = u.uid', 'left');
    $this->db->join('courses cs', 'uc.course_uid = cs.uid', 'left');
    // $this->db->where('u.status', 3);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_all_assesmen($uid)
  {
    $this->db->select('assesmen.*');
    $this->db->from('assesmen');
    $this->db->where('course_uid', $uid);

    $query = $this->db->get();
    return $query->result_array();

    // query untuk mengambil seluruh data dari tabel courses mentor agar 1 mentor bisa banyak kursus dan sebaliknya
    // $this->db->select('c.*, u.full_name');
    // $this->db->from('courses c');
    // $this->db->join('courses_mentor cm', 'c.uid = cm.courses_uid');
    // $this->db->join('users u', 'cm.mentor_uid = u.uid');
    // $this->db->where('u.status =', 2);
    // $query = $this->db->get();
    // return $query->result_array();
  }
  public function update_assesmen($id, $data)
  {
    $this->db->where('uid', $id);
    $this->db->update('assesmen', $data);
  }
  public function delete_assesmen($id)
  {
    $this->db->where('uid', $id);
    $this->db->delete('assesmen');
  }
  public function get_user_courses()
  {
    $this->db->select('uc.*,c.*,u.*, uc.uid as uc_uid');
    $this->db->from('user_courses uc');
    $this->db->join('courses c', 'c.uid = uc.course_uid');
    $this->db->join('users u', 'u.uid = uc.user_uid');
    // $this->db->join('documents d', 'd.user_uid = uc.user_uid');
    $this->db->where('uc.status >', 2);
    $query = $this->db->get();
    return $query->result_array();

    // echo '<pre>';
    // print_r($query->result_array());
    // echo '</pre>';
    // exit;
  }

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

  var $table5 = 'user_courses';
  var $column_order5 = array('user_courses.uid', 'full_name', 'course_name'); //set column field database for datatable orderable
  var $column_search5 = array('user_courses.uid', 'full_name', 'course_name'); //set column field database for datatable searchable 
  var $order5 = array('user_courses.uid' => 'asc'); // default order 

  function _get_datatables_query5()
  {

    $this->db->select('user_courses.*, users.full_name, courses.course_name');
    $this->db->from('user_courses');
    $this->db->join('users', 'users.uid = user_courses.user_uid');
    $this->db->join('courses', 'courses.uid = user_courses.course_uid');
    // $this->db->where('user_ktna.status >', 1);
    $i = 0;

    foreach ($this->column_search5 as $item) // loop column 
    {
      if ($_POST['search']['value']) // if datatable send POST for search
      {

        if ($i === 0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search5) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if (isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order5[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order5;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables5()
  {
    $this->_get_datatables_query5();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered5()
  {
    $this->_get_datatables_query5();
    $query = $this->db->get();
    return $query->num_rows();
  }

  function count_all5()
  {

    $this->_get_datatables_query5();
    $query = $this->db->get();

    return $this->db->count_all_results();
  }


  var $table6 = 'riwayat_asesment';
  var $column_order6 = array('riwayat_asesment.uid', 'asesment_metode', 'tipe_asesmen', 'kode_unit', 'status', 'text'); //set column field database for datatable orderable
  var $column_search6 = array('riwayat_asesment.uid', 'asesment_metode', 'tipe_asesmen', 'kode_unit', 'status', 'text'); //set column field database for datatable searchable 
  var $order6 = array('riwayat_asesment.uid' => 'asc'); // default order 

  function _get_datatables_query6($user_uid, $uid)
  {

    $this->db->select('riwayat_asesment.*, assesmen.*');
    $this->db->from('riwayat_asesment');
    $this->db->join('assesmen', 'assesmen.uid = riwayat_asesment.assesment_uid');
    $this->db->where('user_uid', $user_uid);
    $this->db->where('user_courses_uid', $uid);
    // $this->db->where('user_ktna.status >', 1);
    $i = 0;

    foreach ($this->column_search6 as $item) // loop column 
    {
      if ($_POST['search']['value']) // if datatable send POST for search
      {

        if ($i === 0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search6) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if (isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order6[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order6;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables6($user_uid, $uid)
  {
    $this->_get_datatables_query6($user_uid, $uid);
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered6($user_uid, $uid)
  {
    $this->_get_datatables_query6($user_uid, $uid);
    $query = $this->db->get();
    return $query->num_rows();
  }

  function count_all6($user_uid, $uid)
  {

    $this->_get_datatables_query6($user_uid, $uid);
    $query = $this->db->get();

    return $this->db->count_all_results();
  }
}
