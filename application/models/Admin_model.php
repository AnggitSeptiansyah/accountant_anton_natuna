<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

  public function getAllAdmin(){
    $this->db->select("admin.*, cabang_kantor.nama_cabang, jabatan_admin.nama_jabatan");
    $this->db->join("cabang_kantor", "cabang_kantor.id = admin.kantor_id");
    $this->db->join("jabatan_admin", "jabatan_admin.id = admin.jabatan_id");
    $query = $this->db->get("admin");
    return $query->result_array();
  }

  public function getAllJabatanAdmin(){
    $this->db->select("id, nama_jabatan");
    $query = $this->db->get("jabatan_admin");
    return $query->result_array();
  }

  public function getAllDataKantor(){
    $this->db->select("id, nama_cabang");
    $query = $this->db->get("cabang_kantor");
    return $query->result_array();
  }


  public function tambahAdmin(){
    $data = [
      'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'jabatan_id' => $this->input->post('jabatan_id'),
      'kantor_id' => $this->input->post('kantor_id'),
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
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('admin');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil mengupdate Akun kamu</div>');
    redirect('Pelanggan');
  }

  public function change_password(){
      
  }

  
}