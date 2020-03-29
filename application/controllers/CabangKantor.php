<?php

class CabangKantor extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('CabangKantor_model', 'cabang_kantor');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['judul'] = 'Data Kantor';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['cabang_kantor'] = $this->cabang_kantor->getAllDataKantor();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('cabang_kantor/index', $data);
    $this->load->view('templates/footer');
  } 

  public function tambahKantor(){

    $data['judul'] = 'Tambah Data Kantor';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->form_validation->set_rules('kode_cabang', 'Kode Cabang', 'required|trim');
    $this->form_validation->set_rules('kode_pelanggan', 'Kode Pelanggan', 'required|trim');
    $this->form_validation->set_rules('nama_cabang', 'Nama Cabang', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('no_hp', 'No HP', 'trim');
    $this->form_validation->set_rules('no_wa', 'No WA', 'trim');
    $this->form_validation->set_rules('email', 'Emaiil', 'trim|valid_email');


    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('cabang_kantor/tambah_kantor', $data);
      $this->load->view('templates/footer');
    } else {
      $this->cabang_kantor->tambahKantor();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data Admin berhasil dimasukkan</div>');
      redirect('CabangKantor');
    }
  }



}