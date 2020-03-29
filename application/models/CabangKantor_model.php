<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CabangKantor_model extends CI_Model {
  
  public function tambahKantor(){
    $data = [
      'kode_cabang' => $this->input->post('kode_cabang'),
      'kode_pelanggan' => $this->input->post('kode_pelanggan'),
      'nama_cabang' => $this->input->post('nama_cabang'),
      'alamat' => $this->input->post('alamat'),
      'no_hp' => $this->input->post('no_hp'),
      'no_wa' => $this->input->post('no_wa'),
      'email' => $this->input->post('email'),
    ];

    $this->db->insert('cabang_kantor', $data);

  }

  public function getAllDataKantor(){
    return $this->db->get('cabang_kantor')->result();
  }

}