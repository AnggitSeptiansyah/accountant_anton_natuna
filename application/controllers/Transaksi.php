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


    $data['transaksi'] = $this->transaksi->getAllTransaksi();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('transaksi/index', $data);
    $this->load->view('templates/footer');
  }

  public function detail($id){
    $data['judul'] = 'Detail Transaksi (Invoice)';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

  
    $data['transaksi'] = $this->transaksi->getTransaksiById($id);
    $data['transaksi_produk'] = $this->transaksi->getDetailTransaksi($id);
    

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('transaksi/detail', $data);
    $this->load->view('templates/footer');
    
  }

  public function invoice($id){
      
      $this->load->library('pdf');
      $data['transaksi'] = $this->transaksi->getTransaksiById($id);
      $data['transaksi_produk'] = $this->transaksi->getDetailTransaksi($id);
      $this->load->view('transaksi/invoice', $data);
  }

  public function surat_jalan($id){
    $data['judul'] = 'Detail Transaksi (Invoice)';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['transaksi'] = $this->transaksi->getTransaksiById($id);
    $data['transaksi_produk'] = $this->transaksi->getDetailTransaksi($id);
    

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('transaksi/surat_jalan', $data);
    $this->load->view('templates/footer');
  }

  public function tambahTransaksi(){
    $this->load->library('form_validation');

    $data['judul'] = 'Tambah Transaksi';
    
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    $data['pelanggan'] = $this->db->query("SELECT id, kode_pelanggan, nama_pelanggan FROM pelanggan")->result_array();

    $this->form_validation->set_rules('no_faktur', 'No Faktur', 'required|is_unique[transaksi.no_faktur]|trim');
    $this->form_validation->set_rules('total', 'Total Harga', 'required|numeric|trim');
    $this->form_validation->set_rules('dp', 'DP', 'required|trim|numeric');

    if($this->form_validation->run() == false){
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('transaksi/tambah_transaksi', $data);
      $this->load->view('templates/footer');
    } else{
      $this->transaksi->tambahTransaksi();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
      redirect('transaksi');
    }
    
  }
}