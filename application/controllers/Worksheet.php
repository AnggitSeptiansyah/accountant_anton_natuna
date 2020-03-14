<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Worksheet extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('Worksheet_model', 'worksheet');
  }

  public function index(){
    $data['judul'] = 'Worksheet';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['worksheet'] = $this->worksheet->getAllWorksheet();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('worksheet/index', $data);
    $this->load->view('templates/footer');
  }

  public function jenis_worksheet(){
    $data['judul'] = 'Worksheet';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->load->library('form_validation');

    $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
    $this->form_validation->set_rules('jenis_worksheet', 'Jenis Worksheet', 'required|trim');


    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('worksheet/tambah_jenis_worksheet', $data);
      $this->load->view('templates/footer');
    } else {
      $this->worksheet->tambahJenisWorksheet();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
      redirect('worksheet');
    }
    
  }

  public function tambah_biaya(){
    $data['judul'] = 'Worksheet';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    $data['kode'] = $this->db->get('jenis_worksheet')->result_array();

    $this->load->library('form_validation');

    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|numeric');


    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('worksheet/tambah_biaya', $data);
      $this->load->view('templates/footer');
    } else {
      $this->worksheet->tambahBiaya();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
      redirect('worksheet');
    }
  }

  


}