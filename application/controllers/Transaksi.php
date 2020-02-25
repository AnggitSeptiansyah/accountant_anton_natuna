<?php

class Transaksi extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Transaksi_model', 'transaksi');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['judul'] = 'Transaksi';

    $data['transaksi'] = $this->transaksi->getAllTransaksi();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('transaksi/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahTransaksi(){

    $data['judul'] = 'Tambah Transaksi';
    $data['pelanggan'] = $this->db->query("SELECT id, kode_pelanggan, nama_pelanggan FROM pelanggan")->result_array();
    

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('transaksi/tambah_transaksi', $data);
    $this->load->view('templates/footer');
  }
}