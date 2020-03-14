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

    $data['harian'] = $this->dashboard->getSaldoHarianKas();
    $data['piutang'] = $this->dashboard->getPiutang();
    $data['jumlahtransaksi'] = $this->dashboard->getJumlahTransaksi();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer');
  }


}