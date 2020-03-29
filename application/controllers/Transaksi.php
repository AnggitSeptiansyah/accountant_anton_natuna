<?php

class Transaksi extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    $this->load->model('Transaksi_model', 'transaksi');
    
  }

  public function index(){
    $data['judul'] = 'Transaksi';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    if($this->input->post('submit')){
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']); 
    } else {
      $data['keyword'] = $this->session->set_userdata('keyword');
    }

    $data['transaksi'] = $this->transaksi->getAllTransaksi($data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('transaksi/index', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id){
    $data['judul'] = 'Detail Transaksi (Invoice)';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

  
    $data['transaksi'] = $this->transaksi->getTransaksiById($id);
    $data['transaksi_produk'] = $this->transaksi->getDetailTransaksi($id);
    
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('transaksi/detail', $data);
    $this->load->view('templates/footer');
    
  }

  public function invoice($id){

      $data['transaksi'] = $this->transaksi->getTransaksiById($id);
      $data['transaksi_produk'] = $this->transaksi->getDetailTransaksi($id);
      $this->load->view('transaksi/invoice', $data);
  }

  public function surat_jalan($id){

    $data['judul'] = 'Detail Transaksi (Invoice)';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['transaksi'] = $this->transaksi->getTransaksiById($id);
    $data['transaksi_produk'] = $this->transaksi->getDetailTransaksi($id);
    
    $this->load->view('transaksi/surat_jalan', $data);
  }

  public function tambahTransaksi(){
    $this->load->library('form_validation');

    $data['judul'] = 'Tambah Transaksi';
    
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    $data['pelanggan'] = $this->db->query("SELECT id, kode_pelanggan, nama_pelanggan FROM pelanggan")->result_array();

    $this->form_validation->set_rules('no_acc', 'No Account', 'required|trim');
    $this->form_validation->set_rules('total', 'Total Harga', 'required|numeric|trim');
    $this->form_validation->set_rules('masukan', 'Uang Masuk', 'required|trim|numeric');

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('transaksi/tambah_transaksi', $data);
      $this->load->view('templates/footer');
    } else{
      $this->transaksi->tambahTransaksi();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
      redirect('transaksi');
    }
  }

  public function update($id){
    $this->load->library('form_validation');

    $data['judul'] = 'Update Data Transaksi';
    
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['pelanggan'] = $this->db->get('pelanggan')->result_array();
    $data['transaksi'] = $this->db->get_where('transaksi', ['id' => $id])->row_array();
    
    $this->form_validation->set_rules('no_acc', 'No Account', 'required|trim');
    $this->form_validation->set_rules('no_faktur', 'No Faktur', 'required|trim');
    $this->form_validation->set_rules('total', 'Total Harga', 'required|numeric|trim');
    $this->form_validation->set_rules('masukan', 'Uang Masuk', 'required|trim|numeric');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('transaksi/update_transaksi', $data);
      $this->load->view('templates/footer');
    } else {
      $this->transaksi->updateTransaksi();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data transaksi berhasil diubah!</div>');
      redirect('Transaksi');
    }
  }

  
}