<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{


  public function artikel_1()
  {
    $data['title'] = 'Artikel 1 Tanindo';
    $this->load->view('statis_template/v_header', $data);
    $this->load->view('home/artikel/artikel_1');
    $this->load->view('statis_template/v_footer');
  }
  public function artikel_2()
  {
    $data['title'] = 'Artikel 2 Tanindo';
    $this->load->view('statis_template/v_header', $data);
    $this->load->view('home/artikel/artikel_2');
    $this->load->view('statis_template/v_footer');
  }
}
