<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('Pelanggan_model', 'pelanggan');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['judul'] = 'Data Pelanggan';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    
    $data['pelanggan'] = $this->pelanggan->getAllPelanggan();
    



    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('pelanggan/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah(){
    $data['judul'] = 'Tambah Data Pelanggan';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->form_validation->set_rules('kode_pelanggan', 'Kode Pelanggan', 'required|trim|is_unique[pelanggan.kode_pelanggan]');
    $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|numeric');
    
    if($this->form_validation->run() == false){
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('pelanggan/tambah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->pelanggan->tambahPelanggan();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pelanggan berhasil ditambah</div>');
      redirect('pelanggan');
    }
    
  }
}