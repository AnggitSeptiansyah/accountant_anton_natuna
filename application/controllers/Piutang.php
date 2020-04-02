<?php

class Piutang extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model("Piutang_model", 'piutang');
  }
  
  public function index(){
    $data['judul'] = 'Piutang';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->load->library('pagination');

    $config['base_url'] = base_url() . 'Piutang/index';
    $config['total_rows'] = $this->piutang->countAllPiutang();
    $config['per_page'] = 10;
    $config['num-links'] = 3;

    // Initialize
    $data['start'] = $this->uri->segment(3);
    $this->pagination->initialize($config);

    $data['piutang'] = $this->piutang->getAllPiutang($config['per_page'], $data['start']);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('piutang/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_data_piutang(){
    $data['judul'] = 'Piutang';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    if($this->form_validation->run() == false){
      

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('piutang/tambah_data_piutang', $data);
      $this->load->view('templates/footer');
    }
  }

  public function deletePiutang($id){
    $this->db->where('id', $id);
    $this->db->delete('piutang');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
    redirect('Piutang');
  }

}