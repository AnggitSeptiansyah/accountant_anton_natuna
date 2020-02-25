<?php

class LaporanKasHarian extends CI_Controller {
  
  public function index(){
    $data['judul'] = 'Laporan Kas Harian';

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('laporan_kas_harian/index', $data);
    $this->load->view('templates/footer');
  }
}