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

  public function tambahTransaksi(){
    
  }

}
