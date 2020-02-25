<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index(){
    $data['judul'] = 'Login';

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

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if($user){
      $data = [
        'email' => $user['email'],
        'role_id' => $user['role_id'],
      ];
      $this->session->set_userdata($data);
      if($user['role_id'] == 1){
        redirect('admin');
      } else {
        redirect('user');
      }
    }
  }

}