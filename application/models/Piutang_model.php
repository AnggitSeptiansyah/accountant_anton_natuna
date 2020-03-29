<?php

class Piutang_model extends CI_Model{

  public function getAllPiutang(){

    
    $this->db->select("piutang.*, pelanggan.nama_pelanggan, pelanggan.kode_pelanggan");
    $this->db->from('piutang');
    $this->db->join('pelanggan', 'pelanggan.id = piutang.id_pelanggan', 'left');
    $query = $this->db->get();
    if($query->num_rows() != 0){
      return $query->result_array();
    } else {
      return false;
    }
  }

  
}