<?php

class LaporanKasHarian_model extends CI_Model {

  public function getAllDataLaporan(){
    $this->db->select("*");
    $this->db->from('laporan_kas_harian');
    $this->db->join('pelanggan', 'pelanggan.id = laporan_kas_harian.id_pelanggan', 'left');
    $query = $this->db->get();
    
    if($query->num_rows() != 0){
      return $query->result_array();
    } else {
      return false;
    }
  }
  
}