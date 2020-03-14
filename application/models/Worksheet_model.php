<?php

class Worksheet_model extends CI_Model{

  public function getAllWorksheet(){
    $this->db->select("*");
    $this->db->join("jenis_worksheet", "jenis_worksheet.kode = worksheet.jenis_biaya", "left");
    $query = $this->db->get('worksheet');
    return $query->result_array();
    
  }

  public function tambahJenisWorksheet(){
    $data = [
      'kode' => $this->input->post('kode'),
      'nama_jenis' => $this->input->post('jenis_worksheet'),
    ];

    $this->db->insert('jenis_worksheet', $data);
  }

  public function tambahBiaya(){
    $jenis_biaya = $this->input->post('kode');
    $keterangan = $this->input->post('keterangan');
    $jumlah = $this->input->post('jumlah');

    $data = [
      'jenis_biaya' => $jenis_biaya,
      'keterangan' => $keterangan,
      'jumlah' => $jumlah
    ];

    $this->db->insert('worksheet', $data);

    $this->db->select("saldo");
    $this->db->order_by("id", "desc");
    $this->db->limit(1);
    $laporan_kas = $this->db->get("laporan_kas_harian")->row();
    $saldo_kas = $laporan_kas->saldo - $jumlah;
    
    $data_laporan = [
      'tanggal' => time(),
      'keterangan' => $keterangan,
      'no_acc' => $jenis_biaya,
      'jumlah' => $jumlah,
      'keluar' => $jumlah,
      'saldo' => $saldo_kas
    ];

    $this->db->insert('laporan_kas_harian', $data_laporan);

  }

}