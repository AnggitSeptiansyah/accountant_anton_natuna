<?php

class LaporanKasHarian_model extends CI_Model {

  public function getAllDataLaporan(){
    return $this->db->get('laporan_kas_harian')->result_array();
  }
  
}