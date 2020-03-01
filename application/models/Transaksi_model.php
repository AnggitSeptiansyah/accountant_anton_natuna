<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

  public function getAllTransaksi($limit, $start){
    $query = "
      SELECT `transaksi`.*, `pelanggan`.`nama_pelanggan`, `pelanggan`.`kode_pelanggan`
      FROM `transaksi` JOIN `pelanggan`
      ON `transaksi`.`costumer_id` = `pelanggan`.`id`
    ";

    return $this->db->query($query)->result_array();
  }

  public function getTransaksiById($id){
    $query = "
      SELECT `transaksi`.*, `pelanggan`.`nama_pelanggan`, `pelanggan`.`kode_pelanggan`
      FROM `transaksi` JOIN `pelanggan`
      ON `transaksi`.`costumer_id` = `pelanggan`.`id`
      WHERE `transaksi`.`id` = $id
    ";

    return $this->db->query($query)->row_array();
  }

  public function getDetailTransaksi($id){
    $query = "
      SELECT `transaksi_produk`.*, `transaksi`.`id`, `transaksi`.`tanggal`, `transaksi`.`uang_masuk`, `transaksi`.`total`, `transaksi`.`no_faktur`
      FROM `transaksi_produk` JOIN `transaksi`
      ON `transaksi_produk`.`transaksi_id` = `transaksi`.`id`
      WHERE `transaksi`.`id` = $id
    ";
    $nani = $this->db->query($query)->result_array();
    return $nani;
  }

  public function tambahTransaksi(){
    $no_faktur = $this->input->post('no_faktur');
    $barang = $this->input->post('barang');
    $qty = $this->input->post('qty');
    $harga = $this->input->post('harga');
    $pelanggan_id = $this->input->post('pelanggan_id');
    $total = $this->input->post('total');
    $keterangan = $this->input->post('keterangan');
    $uang_masuk = $this->input->post('masukan');
    $tanggal = time();
    $no_acc = $this->input->post('no_acc');

    $data = [
      'no_faktur' => $no_faktur,
      'costumer_id' => $pelanggan_id,
      'total' => $total,
      'uang_masuk' => $uang_masuk,
      'tanggal' => $tanggal,
      'no_acc' => $no_acc
    ];

    $this->db->insert('transaksi', $data);

    $transaksi_id = $this->db->insert_id();

    $dataSet = '';
    for($i=0; $i<sizeof($barang); $i++){
      if(trim($barang != 0)){
        $datatrans = [
          'transaksi_id' => $transaksi_id,
          'barang' => $barang[$i],
          'qty' => $qty[$i],
          'harga' => $harga[$i],
        ];
        $this->db->insert('transaksi_produk', $datatrans);
      }
    }

    // Masukkan kedalam Khas Harian
    $kas_id = $this->db->insert_id();
    
    $this->db->select("saldo");
    $this->db->order_by("id", "desc");
    $this->db->limit(1);
    $laporan_kas_harian = $this->db->get("laporan_kas_harian")->row();
    if($laporan_kas_harian->saldo == 0 || $laporan_kas_harian->saldo == ''){
      $saldo = $uang_masuk;
    } else {
      $saldo = $laporan_kas_harian->saldo + $uang_masuk;
    }
    
    $data_kas = array(
      'tanggal' => $tanggal,
      'id_pelanggan' => $pelanggan_id,
      'no_reff' => $no_faktur,
      'keterangan' => $keterangan,
      'no_acc' => $no_acc,
      'jumlah' => $total,
      'masuk' => $uang_masuk,
      'saldo' => $saldo
      
    );

    $this->db->insert('laporan_kas_harian', $data_kas);
  
  $debet = $total - $uang_masuk;
  
  $this->db->select("kredit");
  $this->db->order_by("id", "desc");
  $this->db->limit(1);
  $piutang_kredit = $this->db->get("piutang")->row();

  $this->db->select("debet");
  $this->db->order_by("id", "desc");
  $this->db->limit(1);
  $piutang_debet = $this->db->get("piutang")->row();
  

  $this->db->select("saldo");
  $this->db->order_by("id", "desc");
  $this->db->limit(1);
  $piutang_saldo = $this->db->get("piutang")->row();
  if($piutang_saldo->saldo == 0){
    $saldo_piutang = $debet;
  } else {
    $saldo_piutang = $piutang_saldo->saldo + $debet;
  }

  $data_piutang = array(
    'no_acc' => $no_acc,
    'tanggal' => $tanggal,
    'id_pelanggan' => $pelanggan_id,
    'no_reff' => $no_faktur,
    'keterangan' => $keterangan,
    'debet' => $debet,
    'kredit' => 0,
    'saldo' => $saldo_piutang
  );

  if($total - $uang_masuk > 0){
    $this->db->insert('piutang', $data_piutang);
  }
  
  

  }
}
