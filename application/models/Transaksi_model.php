<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

  public function getAllTransaksi($start, $limit, $keyword = null){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    if( $keyword ){
      $this->db->like('no_faktur', $keyword);
      $this->db->or_like('nama_pelanggan', $keyword);
      $this->db->or_like('kode_pelanggan', $keyword);
      $this->db->or_like('tanggal', $keyword);
    }
    
    
    $this->db->select("transaksi.*, pelanggan.nama_pelanggan, pelanggan.kode_pelanggan");
    $this->db->join("pelanggan", "pelanggan.id = transaksi.costumer_id");
    $this->db->where("transaksi.id_kantor", $data['user']['kantor_id']);
    $query = $this->db->get("transaksi", $start, $limit);
    return $query->result_array();
  }

  public function getDataPelanggan(){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->db->select("id, nama_pelanggan, kode_pelanggan");
    $this->db->where("id_kantor", $data['user']['kantor_id']);
    $query = $this->db->get("pelanggan");
    return $query->result_array();
    
  }

  public function getJenisPembayaran(){
    $this->db->select("id, kode_jenis_pembayaran, nama_jenis_pembayaran");
    $query = $this->db->get("jenis_pembayaran");
    return $query->result_array();
  }

  public function countAllTransaksi(){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    
      $this->db->where("transaksi.id_kantor", $data['user']['kantor_id']);
      return $this->db->get('transaksi')->num_rows();

  }

  public function getTransaksiById($id){
    $this->db->select("transaksi.*, pelanggan.nama_pelanggan, pelanggan.kode_pelanggan, pelanggan.telp");
    $this->db->join("pelanggan", "pelanggan.id = transaksi.costumer_id");
    $this->db->where("transaksi.id", $id);
    $query = $this->db->get("transaksi");
    return $query->row_array();
  }

  public function getDetailTransaksi($id){
    $this->db->select("id, transaksi_id, barang, qty, satuan, harga, total_harga");
    $this->db->where("transaksi_id", $id);
    $query = $this->db->get("transaksi_produk");  
    return $query->result_array();
    
  }

  public function tambahTransaksi(){

    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->db->select("no_faktur");
    $this->db->order_by("id", "desc");
    $this->db->where("id_kantor", $data['user']['kantor_id']);
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
    $no_acc = $this->input->post('no_acc');

    $total_yang_dibayar = 0;
    if($diskon == 0){
      $total_yang_dibayar = $total;
    } else{ 
      $total_yang_dibayar = $total - $diskon;
    }
    

    // Data Transaksi -> Database
    $data = [
      'no_faktur' => $no_faktur,
      'costumer_id' => $pelanggan_id,
      'total' => $total,
      'uang_masuk' => $uang_masuk,
      'diskon' => $diskon,
      'total_yang_dibayar' => $total_yang_dibayar,
      'no_acc' => $no_acc,
      'created_by' => $data['user']['nama'],
      'id_kantor' => $data['user']['kantor_id']
    ];

    $this->db->insert('transaksi', $data);

    $transaksi_id = $this->db->insert_id();

    $data_history_pembayaran = [
      'id_transaksi' => $transaksi_id,
      'history_pembayaran' => $uang_masuk
    ];
    
    $this->db->insert('history_pembayaran', $data_history_pembayaran);

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
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    
    $this->db->select("saldo");
    $this->db->where("id_kantor", $data['user']['kantor_id']);
    $this->db->order_by("id", "desc");
    
    $laporan_kas_harian = $this->db->get("laporan_kas_harian")->row();
    if($laporan_kas_harian->saldo == 0 || $laporan_kas_harian->saldo == ''){
      $saldo = $uang_masuk;
    } else {
      $saldo = $laporan_kas_harian->saldo + $uang_masuk;
    }

    // Data Kas -> Database
    $data_kas = [
      'id_kantor' => $data['user']['kantor_id'],
      'id_pelanggan' => $pelanggan_id,
      'no_reff' => $no_faktur,
      'keterangan' => $keterangan,
      'no_acc' => $no_acc,
      'jumlah' => $total_yang_dibayar,
      'masuk' => $uang_masuk,
      'saldo' => $saldo
    ];

    $this->db->insert('laporan_kas_harian', $data_kas);
    

    // Piutang
    $debet = $total_yang_dibayar - $uang_masuk;

    // Ambil data saldo terakhir sesuai dengan id kantor
    // Berguna untuk dijumlahkan dengan saldo berikutnya
    $this->db->select("saldo");
    $this->db->where("id_kantor", $data['user']['kantor_id']);
    $this->db->order_by("id", "desc");
    $piutang_saldo = $this->db->get("piutang")->row();
    if($piutang_saldo->saldo == 0){
      $saldo_piutang = $debet;
    } else {
      $saldo_piutang = $piutang_saldo->saldo + $debet;
    }

    $data_piutang = array(
      'no_acc' => $no_acc,
      'id_kantor' => $data['user']['kantor_id'],
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

    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    
    $no_acc = $this->input->post('no_acc');
    $no_faktur = $this->input->post('no_faktur');
    $pelanggan_id = $this->input->post('pelanggan_id');
    $total = $this->input->post('total');
    $keterangan = $this->input->post('keterangan');
    $uang_masuk = $this->input->post('masukan');
    $jenis_pembayaran = $this->input->post('id_jenis_pembayaran');

    $this->db->select("uang_masuk");
    $this->db->where("id", $this->input->post('id'));
    $_uang_masuk = $this->db->get('transaksi')->row();
    $penambahan_uang_masuk = $uang_masuk - $_uang_masuk->uang_masuk;

    $data = [
      'no_faktur' => $no_faktur,
      'costumer_id' => $pelanggan_id,
      'total_yang_dibayar' => $total,
      'no_acc' => $no_acc,
      'uang_masuk' => $uang_masuk,
      'created_by' => $data['user']['nama'],
      'id_jenis_pembayaran' => $jenis_pembayaran,
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('transaksi', $data);

    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->db->select("saldo");
    $this->db->where("id_kantor", $data['user']['kantor_id']);
    $this->db->order_by("id", "desc");
    $laporan_kas_harian_saldo = $this->db->get("laporan_kas_harian")->row();
    $tambah_saldo = $laporan_kas_harian_saldo->saldo + $penambahan_uang_masuk;

    $this->db->select("saldo");
    $this->db->order_by("id", "desc");
    $laporan_bank = $this->db->get("laporan_bank_harian")->row();
    if($laporan_bank->saldo == 0 || $laporan_bank == '') {
      $tambah_saldo_bank = $penambahan_uang_masuk;
    } else {
      $tambah_saldo_bank = $laporan_bank->saldo + $penambahan_uang_masuk;
    }
    

    if($penambahan_uang_masuk > 0){
      if($jenis_pembayaran == 1){
        $data_laporan = [
          'no_acc' => $no_acc,
          'id_pelanggan' => $pelanggan_id,
          'keterangan' => $keterangan,
          'no_reff' => $no_faktur,
          'jumlah' => $total,
          'masuk' => $penambahan_uang_masuk,
          'saldo' => $tambah_saldo,
          'id_kantor' => $data['user']['kantor_id'],
        ];
    
        $this->db->insert('laporan_kas_harian', $data_laporan);

      } else {
        $data_bank = [
          'id_pelanggan' => $pelanggan_id,
          'no_acc' => $no_acc,
          'no_reff' => $no_faktur,
          'keterangan' => $keterangan,
          'masuk' => $penambahan_uang_masuk,
          'saldo' => $tambah_saldo_bank,
          'id_kantor' => $data['user']['kantor_id'],
        ];
  
        $this->db->insert("laporan_bank_harian", $data_bank);
      }

        
      $kredit = $penambahan_uang_masuk;

      $this->db->select("saldo");
      $this->db->order_by("id", "desc");
      $this->db->limit(1);
      $pengurangan_saldo_piutang = $this->db->get("piutang")->row();
      $piutang_saldo = $pengurangan_saldo_piutang->saldo - $kredit;

      $data_piutang = [
        'no_acc' => $no_acc,
        'id_kantor' => $data['user']['kantor_id'],
        'id_pelanggan' => $pelanggan_id,
        'keterangan' => $keterangan,
        'no_reff' => $no_faktur,
        'kredit' => $kredit,
        'saldo' => $piutang_saldo
      ];

      $this->db->insert('piutang', $data_piutang);

    }


  }
}
