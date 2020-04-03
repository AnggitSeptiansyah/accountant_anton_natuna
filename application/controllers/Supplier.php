<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->library('form_validation');
    $this->load->model('Supplier_model', 'supplier');
  }
  public function index(){

    $data['judul'] = 'Supplier';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('supplier/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahSupplier(){
    $data['judul'] = 'Tambah Supplier';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->form_validation->set_rules('kode_supplier', 'Kode Supplier', 'required|trim');
    $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('no_hp', 'NO HP', 'required|trim|numeric');
    $this->form_validation->set_rules('no_wa', 'NO WA', 'required|trim|numeric');

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('supplier/tambah_supplier', $data);
      $this->load->view('templates/footer');
    } else {
      $this->supplier->tambahSupplier();
    }
    
  }
}