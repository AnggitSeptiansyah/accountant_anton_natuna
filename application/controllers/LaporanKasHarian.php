<?php

class LaporanKasHarian extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('LaporanKasHarian_model', 'laporan');
  }
  
  public function index(){
    $data['judul'] = 'Laporan Kas Harian';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    if($this->input->post('submit')){
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->set_userdata('keyword');
    }

    $data['laporan'] = $this->laporan->getAllDataLaporan($data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('laporan_kas_harian/index', $data);
    $this->load->view('templates/footer');
  }

  public function deleteLaporan($id){
    $this->db->where('id', $id);
    $this->db->delete('laporan_kas_harian');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
    redirect('LaporanKasHarian');
  }

  




}