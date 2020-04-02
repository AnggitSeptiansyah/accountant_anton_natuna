<?php

class LaporanBankHarian extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('LaporanBankHarian_model', 'laporan_bank_harian');
  }
  
  public function index(){
    $data['judul'] = 'Laporan Bank Harian';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->load->library('pagination');

    $config['base_url'] = base_url() . 'LaporanBankHarian/index';
    $config['total_rows'] = $this->laporan_bank_harian->countAllLaporanBank();
    $config['per_page'] = 10;
    $config['num-links'] = 3;

    // Initialize
    $data['start'] = $this->uri->segment(3);
    $this->pagination->initialize($config);

    if($this->input->post('submit')){
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->set_userdata('keyword');
    }

    $data['laporan'] = $this->laporan_bank_harian->getAllDataLaporanBank($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('laporan_bank_harian/index', $data);
    $this->load->view('templates/footer');
  }

  public function transferKeKas(){
    $this->load->library('form_validation');

    $data['judul'] = 'Transfer Ke Kas';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    $data['data_kantor'] = $this->laporan_bank_harian->getDataKantor();

    $this->form_validation->set_rules("total_transfer", "Total Transfer", 'required|trim|numeric');
    $this->form_validation->set_rules("keterangan", "Keterangan", 'required|trim');

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('laporan_bank_harian/transfer_ke_kas', $data);
      $this->load->view('templates/footer');
    } else {
      $this->laporan_bank_harian->transferKeKas();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berasil Ditambah</div>');
      redirect('LaporanBankHarian');
    }
    
  }

}