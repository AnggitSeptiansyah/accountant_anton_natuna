<?php

class Dashboard_model extends CI_Model {

  public function getSaldoHarianKasSurabaya(){
    $this->db->select("saldo");
    $this->db->where("id_kantor", "1");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("laporan_kas_harian");
    if($query->num_rows() == 0){
      return 0;
    } else {
      return $query->row_array();
    }
  }

  public function getSaldoHarianKasArengka(){
    $this->db->select("saldo");
    $this->db->where("id_kantor", "4");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("laporan_kas_harian");
    if($query->num_rows() == 0){
      return 0;
    } else {
      return $query->row_array();
    }
  }

  public function getSaldoHarianKasTeratai(){
    $this->db->select("saldo");
    $this->db->where("id_kantor", "2");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("laporan_kas_harian");
    if($query->num_rows() == 0){
      return 0;
    } else {
      return $query->row_array();
    }
  }

  public function getSaldoHarianKasKepri(){
    $this->db->select("saldo");
    $this->db->where("id_kantor", "3");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("laporan_kas_harian");
    if($query->num_rows() == 0){
      return 0;
    } else {
      return $query->row_array();
    }
  }

  public function getLaporanBank(){
    $this->db->select("saldo");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("laporan_bank_harian");
    if($query->num_rows() == 0){
      return 0;
    } else {
      return $query->row_array();
    }
  }

  public function getPiutangSurabaya(){
    $this->db->select("saldo");
    $this->db->where("id_kantor", "1");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("piutang");
    if($query->num_rows() == 0){
      return 0;
    } else {
      return $query->row_array();
    }
  }

  public function getPiutangTeratai(){
    $this->db->select("saldo");
    $this->db->where("id_kantor", "2");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("piutang");
    if($query->num_rows() == 0){
      return 0;
    } else {
      return $query->row_array();
    }
  }

  public function getPiutangKepri(){
    $this->db->select("saldo");
    $this->db->where("id_kantor", "3");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("piutang");
    if($query->num_rows() == 0){
      return 0;
    } else {
      return $query->row_array();
    }
  }

  public function getPiutangArengka(){
    $this->db->select("saldo");
    $this->db->where("id_kantor", "4");
    $this->db->order_by("id", "desc");
    $query = $this->db->get("piutang");
    if($query->num_rows() == 0){
      return 0;
    } else {
      return $query->row_array();
    }
  }

  public function getWorksheetSurabaya(){

    $tanggal = date("m");

    $this->db->select_sum("jumlah");
    $this->db->where(["id_kantor" => 1, "month(tanggal)" => $tanggal]);
    $query = $this->db->get("worksheet");
    return $query->row()->jumlah;
  }

  public function getWorksheetTeratai(){

    $tanggal = date("m");

    $this->db->select_sum("jumlah");
    $this->db->where(["id_kantor" => 2, "month(tanggal)" => $tanggal]);
    $query = $this->db->get("worksheet");
    return $query->row()->jumlah;
  }

  public function getWorksheetKepri(){

    $tanggal = date("m");

    $this->db->select_sum("jumlah");
    $this->db->where(["id_kantor" => 3, "month(tanggal)" => $tanggal]);
    $query = $this->db->get("worksheet");
    return $query->row()->jumlah;
  }
  
  public function getWorksheetArengka(){

    $tanggal = date("m");

    $this->db->select_sum("jumlah");
    $this->db->where(["id_kantor" => 4, "month(tanggal)" => $tanggal]);
    $query = $this->db->get("worksheet");
    return $query->row()->jumlah;
  }


  public function getJumlahTransaksi(){
    $tanggal = date('m');

    $this->db->where("tanggal", $tanggal);
    return $this->db->get("transaksi")->num_rows();
  }

}