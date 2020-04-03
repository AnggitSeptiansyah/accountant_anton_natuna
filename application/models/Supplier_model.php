<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_model {

  public function index(){

  }

  public function tambahSupplier(){
    $kode_supplier = $this->input->post('kode_supplier');
    $nama_supplier = $this->input->post('nama_supplier');
    $alamat = $this->input->post('alamat');
    $no_hp = $this->input->post('no_hp');
    $no_wa = $this->input->post('no_wa');

    $data = [
      'kode_supplier' => $kode_supplier,
      'nama_supplier' => $nama_supplier,
      'alamat' => $alamat,
      'no_hp' => $no_hp,
      'no_wa' => $no_wa,
    ];

    $this->db->insert("supplier", $data);
  }
}
