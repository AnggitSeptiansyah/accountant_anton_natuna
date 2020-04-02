<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('Dashboard_model', 'dashboard');
  }

  public function index(){
    $data['judul'] = 'Dashboard';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['harian_surabaya'] = $this->dashboard->getSaldoHarianKasSurabaya();
    $data['harian_arengka'] = $this->dashboard->getSaldoHarianKasArengka();
    $data['harian_teratai'] = $this->dashboard->getSaldoHarianKasTeratai();
    $data['harian_kepri'] = $this->dashboard->getSaldoHarianKasKepri();

    $data['bank_harian'] = $this->dashboard->getLaporanBank();

    $data['piutang_surabaya'] = $this->dashboard->getPiutangSurabaya();
    $data['piutang_arengka'] = $this->dashboard->getPiutangArengka();
    $data['piutang_kepri'] = $this->dashboard->getPiutangKepri();
    $data['piutang_teratai'] = $this->dashboard->getPiutangTeratai();
    

    $data['worksheet_surabaya'] = $this->dashboard->getWorksheetSurabaya();
    $data['worksheet_teratai'] = $this->dashboard->getWorksheetTeratai();
    $data['worksheet_kepri'] = $this->dashboard->getWorksheetKepri();
    $data['worksheet_arengka'] = $this->dashboard->getWorksheetArengka();


    $data['jumlahtransaksi'] = $this->dashboard->getJumlahTransaksi();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer');
  }


}