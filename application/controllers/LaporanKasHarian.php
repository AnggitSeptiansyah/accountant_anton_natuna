<?php

class LaporanKasHarian extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('LaporanKasHarian_model', 'laporan');
  }
  
  public function index(){
    $data['judul'] = 'Laporan Kas Harian';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['laporan'] = $this->laporan->getAllDataLaporan();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('laporan_kas_harian/index', $data);
    $this->load->view('templates/footer');
  }
}