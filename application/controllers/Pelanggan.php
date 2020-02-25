<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {


  public function __construct(){
    parent::__construct();
    $this->load->model('Pelanggan_model', 'pelanggan');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['judul'] = 'Data Pelanggan';
    $data['pelanggan'] = $this->pelanggan->getAllPelanggan();


    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('pelanggan/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah(){
    $data['judul'] = 'Tambah Data Pelanggan';

    $this->form_validation->set_rules('kode_pelanggan', 'Kode Pelanggan', 'required|trim');
    $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|numeric');
    
    if($this->form_validation->run() == false){
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('pelanggan/tambah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->pelanggan->tambahPelanggan();
      $this->session->set_flashdata('message');
      redirect('pelanggan');
    }
    
  }
}