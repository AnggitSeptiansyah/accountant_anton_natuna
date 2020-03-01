<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanAdmin extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('JabatanAdmin_model');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['judul'] = 'Data Jabatan';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    $data['jabatanAdmin'] = $this->JabatanAdmin_model->getAllJabatanAdmin();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('jabatan_admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah(){
    $data['judul'] = 'Tambah Data Jabatan';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim');

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('jabatan_admin/tambah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->JabatanAdmin_model->tambahJabatanAdmin();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
      redirect('JabatanAdmin');
    } 
  }

  public function deletejabatan($id){
    $this->db->where('id', $id);
    $this->db->delete('jabatan_admin');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
    redirect('JabatanAdmin');
  }

  public function update($id){

    $data['judul'] = 'Update Data Jabatan';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['jabatan'] = $this->db->get_where('jabatan_admin', ['id' => $id])->row_array();

    $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('jabatan_admin/update', $data);
      $this->load->view('templates/footer');
    } else {
      $this->JabatanAdmin_model->updateJabatanAdmin();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
      redirect('JabatanAdmin');
    }

  }
}