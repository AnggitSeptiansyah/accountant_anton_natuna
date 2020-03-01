<?php

class Piutang extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model("Piutang_model", 'piutang');
  }
  
  public function index(){
    $data['judul'] = 'Piutang';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['piutang'] = $this->piutang->getAllPiutang();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('piutang/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_data_piutang(){

    if($this->form_validation->run() == false){
      $data['judul'] = 'Piutang';
      $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('piutang/tambah_data_piutang', $data);
      $this->load->view('templates/footer');
    }
  }

}