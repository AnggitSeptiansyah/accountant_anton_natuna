<?php

class Admin extends CI_Controller {

  public function __construct(){
    parent::__construct();
    is_logged_in();
    $this->load->model('Admin_model', 'admin');
    $this->load->library('form_validation');
  }

  public function index(){
    $data['judul'] = 'Data Admin';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['admin'] = $this->admin->getAllAdmin();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
    
  }

  public function tambah(){

    $data['judul'] = 'Tambah Data Admin';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data['admin'] = $this->admin->getAllAdmin();
    $data['jabatanAdmin'] = $this->db->get('jabatan_admin')->result_array();

    $this->form_validation->set_rules('nama', 'Nama User', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[6]|matches[password1]');
    

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/tambah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->admin->tambahAdmin();  
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data Admin berhasil dimasukkan</div>');
      redirect('admin');
    }
  }

  public function profile(){
    $data['judul'] = 'Profile Admin';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array(); 

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/profile', $data);
    $this->load->view('templates/footer');
  }

  public function edit_profile(){
    $data['judul'] = 'Edit Data Admin';
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->form_validation->set_rules('nama', 'Nama User', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/edit_profile', $data);
      $this->load->view('templates/footer');
    } else {
      $this->admin->editprofile();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil mengubah profile Anda</div>');
      redirect('admin/profile');
    }
  }

  public function change_password(){
    $data['judul'] = "Ubah Password";
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|trim|min_length[6]|matches[new_password1]');
    

    if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/change_password', $data);
      $this->load->view('templates/footer');
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');

      if(!password_verify($current_password, $data['user']['password'])){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password</div>');
        redirect('admin/change_password');
      } else {
        if($current_password == $new_password){
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be the same as current password</div>');
          redirect('admin/change_password');
        } else {
          // Password sudah berbeda
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('email', $data['user']['email']);
          $this->db->update('admin');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been Change Successfully</div>');
          redirect('admin/change_password');
        }
      }
    }
  }

}