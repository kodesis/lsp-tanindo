<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('cek_akses')) {
  function cek_akses($required_role)
  {
    $CI = &get_instance();
    $user_role = $CI->session->userdata('status');  // Mengambil role user dari session

    if ($user_role !== $required_role) {
      redirect('auth/error_500');  // Redirect ke halaman forbidden jika tidak memiliki hak akses
    }
  }
}
