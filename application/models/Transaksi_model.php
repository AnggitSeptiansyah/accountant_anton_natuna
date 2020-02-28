<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

  public function getAllTransaksi(){
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
      SELECT `transaksi_produk`.*, `transaksi`.`id`, `transaksi`.`tanggal`, `transaksi`.`dp`, `transaksi`.`total`, `transaksi`.`no_faktur`
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
    $dp = $this->input->post('dp');
    $tanggal = time();
    $created_by = $this->session->userdata['email'];

    $data = [
      'no_faktur' => $no_faktur,
      'costumer_id' => $pelanggan_id,
      'total' => $total,
      'dp' => $dp,
      'tanggal' => $tanggal
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

    // // Surat SJ
    // $dataSJ = ''
    // for($i=0; $i<sizeof($barang); $i++){
    //   if(trim($barang != 0)){
    //     $dataSJ = [
    //       'no_faktur' => $no_faktur,
    //       ''
    //     ]
    //   }
    // }
    
    
    // Masukkan kedalam Khas Harian
    // $kas_id = $this->db->insert_id();

    
  }
  

}
