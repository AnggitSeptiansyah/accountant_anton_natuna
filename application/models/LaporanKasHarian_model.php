<?php

class LaporanKasHarian_model extends CI_Model {

  public function getAllDataLaporan($keyword = null){

    if( $keyword ){
      $this->db->like('no_acc', $keyword);
      $this->db->or_like('keterangan', $keyword);
      $this->db->or_like('nama_pelanggan', $keyword);
      $this->db->or_like('kode_pelanggan', $keyword);
    }
    $this->db->select("laporan_kas_harian.*, pelanggan.nama_pelanggan, pelanggan.kode_pelanggan");
    $this->db->from('laporan_kas_harian');
    $this->db->join('pelanggan', 'pelanggan.id = laporan_kas_harian.id_pelanggan', 'left');
    $query = $this->db->get();

    return $query->result_array();
  }

  
  
}