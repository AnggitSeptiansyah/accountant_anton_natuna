<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index(){

    if ($this->session->userdata('email')){
      redirect('dashboard');
    }

    $data['judul'] = 'Login';

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    
    if($this->form_validation->run() == false){
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/index');
      $this->load->view('templates/auth_footer');
    } else {
      $this->_Login();
    }
  }

  public function _Login(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('admin', ['email' => $email])->row_array();

    if($user){
      if(password_verify($password, $user['password'])){
        $data = [
          'email' => $user['email'],
          'jabatan_id' => $user['jabatan_id'],
          'nama' => $user['nama'],
        ];
        $this->session->set_userdata($data);
        redirect('dashboard');
      } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang Anda Masukkan Salah</div>');
          redirect('auth');
      }
    }
    else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email yang anda masukkan tidak di register</div>');
      redirect('auth');
    } 
  }

  public function logout(){
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('jabatan_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu telah Logut</div>');
    redirect('auth'); 
  }

  
}