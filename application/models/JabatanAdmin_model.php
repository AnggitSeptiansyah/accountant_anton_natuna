<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanAdmin_model extends CI_Model {

  public function getAllJabatanAdmin(){
    $query = "SELECT id, nama_jabatan FROM jabatan_admin";
    return $this->db->query($query)->result_array();
  }

  public function tambahJabatanAdmin(){
    $data = [
      'nama_jabatan' => $this->input->post('nama_jabatan', true),
    ];

    $this->db->insert('jabatan_admin', $data);
  }

}