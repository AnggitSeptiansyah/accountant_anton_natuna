<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

  public function getAllTransaksi($keyword = null){
    if($keyword) {
      $query = "SELECT * FROM transaksi JOIN pelanggan ON pelanggan.id = transaksi.costumer_id WHERE no_faktur LIKE '%$keyword%' OR nama_pelanggan LIKE '%$keyword%'";
    } else {
      $query = "
        SELECT `transaksi`.*, `pelanggan`.`nama_pelanggan`, `pelanggan`.`kode_pelanggan`
        FROM `transaksi` JOIN `pelanggan`
        ON `transaksi`.`costumer_id` = `pelanggan`.`id`
      ";
    }
    
    return $this->db->query($query)->result_array();

  }

  public function getTransaksiById($id){
    $query = "
      SELECT `transaksi`.*, `pelanggan`.`nama_pelanggan`, `pelanggan`.`kode_pelanggan`, `pelanggan`.`telp`
      FROM `transaksi` JOIN `pelanggan`
      ON `transaksi`.`costumer_id` = `pelanggan`.`id`
      WHERE `transaksi`.`id` = $id
    ";
    return $this->db->query($query)->row_array();
    
  }

  public function getDetailTransaksi($id){
    $query = "
      SELECT * FROM `transaksi_produk` WHERE `transaksi_id` = $id
    ";
    
    $nani = $this->db->query($query)->result_array();
    return $nani;
  }

  public function tambahTransaksi(){

    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->db->select("no_faktur");
    $this->db->order_by("id", "desc");
    $getFaktur = $this->db->get("transaksi")->row();
    $faktur = $getFaktur->no_faktur;

    $no_faktur = $faktur + 1;
    $barang = $this->input->post('barang');
    $qty = $this->input->post('qty');
    $harga = $this->input->post('harga');
    $pelanggan_id = $this->input->post('pelanggan_id');
    $total = $this->input->post('total');
    $uang_masuk = $this->input->post('masukan');
    $diskon = $this->input->post('diskon');
    $satuan = $this->input->post("satuan");
    $totalhargabarang = $this->input->post('total_harga_barang');
    $keterangan = $this->input->post('keterangan');
    $tanggal = time();
    $no_acc = $this->input->post('no_acc');
    

    // Data Transaksi -> Database
    $data = [
      'no_faktur' => $no_faktur,
      'costumer_id' => $pelanggan_id,
      'total' => $total,
      'uang_masuk' => $uang_masuk,
      'diskon' => $diskon,
      'tanggal' => $tanggal,
      'no_acc' => $no_acc,
      'created_by' => $data['user']['nama']
    ];

    $this->db->insert('transaksi', $data);

    $transaksi_id = $this->db->insert_id();


    // Data Transaksi Produk -> Database
    for($i=0; $i<sizeof($barang); $i++){
      if(trim($barang != 0)){
        $datatrans = [
          'transaksi_id' => $transaksi_id,
          'barang' => $barang[$i],
          'qty' => $qty[$i],
          'satuan' => $satuan[$i],
          'harga' => $harga[$i],
          'total_harga' => $totalhargabarang[$i],
        ];
        $this->db->insert('transaksi_produk', $datatrans);
      }
    }

    // Masukkan kedalam Khas Harian
    $this->db->select("saldo");
    $this->db->order_by("id", "desc");
    $this->db->limit(1);
    $laporan_kas_harian = $this->db->get("laporan_kas_harian")->row();
    if($laporan_kas_harian->saldo == 0 || $laporan_kas_harian->saldo == ''){
      $saldo = $uang_masuk;
    } else {
      $saldo = $laporan_kas_harian->saldo + $uang_masuk;
    }
    
    // DAta Kas -> Database
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

  public function updateTransaksi(){

    // Update Transaksi
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    
    $no_acc = $this->input->post('no_acc');
    $no_faktur = $this->input->post('no_faktur');
    $pelanggan_id = $this->input->post('pelanggan_id');
    $total = $this->input->post('total');
    $keterangan = $this->input->post('keterangan');
    $uang_masuk = $this->input->post('masukan');
    $tanggal = time();

    $this->db->select("uang_masuk");
    $this->db->where("id", $this->input->post('id'));
    $_uang_masuk = $this->db->get('transaksi')->row();
    $penambahan_uang_masuk = $uang_masuk - $_uang_masuk->uang_masuk;

    $this->db->select("saldo");
    $this->db->order_by("id", "desc");
    $this->db->limit(1);
    $laporan_kas_harian_saldo = $this->db->get("laporan_kas_harian")->row();
    $tambah_saldo = $laporan_kas_harian_saldo->saldo + $penambahan_uang_masuk;


    $data = [
      'no_faktur' => $no_faktur,
      'costumer_id' => $pelanggan_id,
      'total' => $total,
      'tanggal' => $tanggal,
      'no_acc' => $no_acc,
      'uang_masuk' => $uang_masuk,
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('transaksi', $data);


    // Tambah ke laporan kas harian
    $data_laporan = [
      'tanggal' => $tanggal,
      'no_acc' => $no_acc,
      'id_pelanggan' => $pelanggan_id,
      'keterangan' => $keterangan,
      'no_reff' => $no_faktur,
      'jumlah' => $total,
      'masuk' => $penambahan_uang_masuk,
      'saldo' => $tambah_saldo,
    ];

    $this->db->insert('laporan_kas_harian', $data_laporan);

    $kredit = $penambahan_uang_masuk;

    $this->db->select("saldo");
    $this->db->order_by("id", "desc");
    $this->db->limit(1);
    $pengurangan_saldo_piutang = $this->db->get("piutang")->row();
    $piutang_saldo = $pengurangan_saldo_piutang->saldo - $kredit;

    $data_piutang = [
      'no_acc' => $no_acc,
      'tanggal' => $tanggal,
      'id_pelanggan' => $pelanggan_id,
      'keterangan' => $keterangan,
      'no_reff' => $no_faktur,
      'kredit' => $kredit,
      'saldo' => $piutang_saldo
    ];

    $this->db->insert('piutang', $data_piutang);

  }

}
