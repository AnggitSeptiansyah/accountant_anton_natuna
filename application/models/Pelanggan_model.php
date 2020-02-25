<?php

class Pelanggan_model extends CI_Model {
 
  public function getAllPelanggan(){
    $query = "SELECT * FROM pelanggan";

    return $this->db->query($query)->result_array();
  }

  public function tambahPelanggan(){
    $data = [
      'kode_pelanggan' => $this->input->post('kode_pelanggan'),
      'nama_pelanggan' => $this->input->post('nama'),
      'alamat' => $this->input->post('alamat'),
      'telp' => $this->input->post('telepon'),
    ];

    $this->db->insert('pelanggan', $data);
  }

}