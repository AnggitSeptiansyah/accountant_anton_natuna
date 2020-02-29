<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

  public function getAllAdmin(){
    $query = "
      SELECT `admin`.*, `jabatan_admin`.`nama_jabatan`
      FROM `admin` JOIN `jabatan_admin`
      ON `admin`.`jabatan_id` = `jabatan_admin`.`id`
    ";

    return $this->db->query($query)->result_array();
  }

  public function tambahAdmin(){
    $data = [
      'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'jabatan_id' => $this->input->post('jabatan_id'),
      'date_created' => time()
    ];

    // Siapkan token
    $token = base64_encode(random_bytes(32));
    $admin_token = [
      'email' => $data['email'],
      'token' => $token,
      'date_created' => time()
    ];

    $this->db->insert('admin', $data);
    $this->db->insert('admin_token', $admin_token);
  }

  public function editprofile(){
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');

    $upload_image = $_FILES['img']['name'];

    if($upload_image){
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '2048';
      $config['upload_path'] = './assets/img/profile/';

      $this->load->library('upload', $config);

      if($this->upload->do_upload('img')){
        $old_image = $data['user']['img'];
        if($old_image != 'default.png'){
          unlink(FCPATH . './assets/img/profile/' . $old_iamge);
        }

        $new_image = $this->upload->data('file_name');
        $this->db->set('img', $new_image);
      } else {
        echo $this->upload->display_errors();
      }
    }

    $this->db->set('nama', $nama);
    $this->db->set('email', $email);
    $this->db->update('admin');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil mengupdate Akun kamu</div>');
    redirect('admin/profile');
  }

  public function change_password(){
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