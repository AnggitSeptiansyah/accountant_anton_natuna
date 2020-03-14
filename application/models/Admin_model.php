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
      'img' => "default.png",
      'date_created' => time(),
    ];

    // Siapkan token 
    $this->db->insert('admin', $data);
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
      
  }

  
}