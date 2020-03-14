<?php

class Dashboard_model extends CI_Model {

  public function getSaldoHarianKas(){
    $this->db->select("saldo");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("laporan_kas_harian");
    return $query->row_array();
  }

  public function getPiutang(){
    $this->db->select("saldo");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("piutang");
    return $query->row_array();
  }

  public function getJumlahTransaksi(){
    $tanggal = time();

    return $this->db->where("tanggal", $tanggal)->count_all_results("transaksi");
  }

}