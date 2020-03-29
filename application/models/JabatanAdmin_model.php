<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanAdmin_model extends CI_Model {

  public function getAllJabatanAdmin(){
    $query = "SELECT id, nama_jabatan FROM jabatan_admin";
    return $this->db->query($query)->result_array();
  }

  

  public function getJabatanById($id){
    $query = $this->db->get_where('jabatan_admin', ['id' => $id]);
    return $query->row_array();
  }

  public function hapusJabatan($id){
    $this->db->where('id', $id);
    $this->db->delete('jabatan_admin');
  }

  public function tambahJabatanAdmin(){
    $data = [
      'nama_jabatan' => $this->input->post('nama_jabatan', true),
    ];

    $this->db->insert('jabatan_admin', $data);
  }

  public function updateJabatanAdmin(){
    $data = [
      'nama_jabatan' => $this->input->post('nama_jabatan', true)
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('jabatan_admin', $data);
  }

}