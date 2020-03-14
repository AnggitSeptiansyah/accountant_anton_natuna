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

    
    if($this->input->post('submit')){
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->set_userdata('keyword');
    }
    
    $data['pelanggan'] = $this->pelanggan->getAllPelanggan($data['keyword']);
    
    $this->load->view('templates/header', $data);
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
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim');
    $this->form_validation->set_rules('telepon', 'Telepon', 'trim');
    
    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
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

  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('pelanggan');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
    redirect('Pelanggan');
  }

  public function update($id){
    $data['judul'] = 'Ubah Data Pelanggan';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['pelanggan'] = $this->db->get_where('pelanggan', ['id' => $id])->row_array();
    

    $this->form_validation->set_rules('kode_pelanggan', 'Kode Pelanggan', 'required|trim|is_unique[pelanggan.kode_pelanggan]');
    $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim');
    $this->form_validation->set_rules('telepon', 'Telepon', 'trim|numeric');
    
    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('pelanggan/update', $data);
      $this->load->view('templates/footer');
    } else {
      $this->pelanggan->ubahPelanggan();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pelanggan berhasil diubah</div>');
      redirect('Pelanggan');
    }
  }

  public function detail($id){
    $data['judul'] = 'Detail Data Pelanggan';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    
    $data['detail_pelanggan'] = $this->pelanggan->getDetailPelanggan($id);
    $data['transaksi_pelanggan'] = $this->pelanggan->getTransaksiPelanggan($id);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pelanggan/detail', $data);
    $this->load->view('templates/footer');
    
  }
}