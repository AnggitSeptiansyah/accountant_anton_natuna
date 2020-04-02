<?php

class Worksheet_model extends CI_Model{

  public function getAllWorksheet($limit, $start, $keyword = null){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    if( $keyword ){
      $this->db->like('jenis_biaya', $keyword);
      $this->db->or_like('nama_jenis_pembayaran', $keyword);
      $this->db->or_like('tanggal', $keyword);
    }

    $this->db->select("worksheet.id, worksheet.jenis_biaya, worksheet.keterangan, worksheet.jumlah, worksheet.tanggal, worksheet.id_jenis_pembayaran, jenis_pembayaran.id, jenis_pembayaran.nama_jenis_pembayaran");
    $this->db->where("id_kantor", $data['user']['kantor_id']);
    $this->db->join("jenis_pembayaran", "jenis_pembayaran.id = worksheet.id_jenis_pembayaran", "left");
    $query = $this->db->get('worksheet', $limit, $start);
    return $query->result_array(); 
  }

  public function getWorksheetEachDay(){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    $tanggal = date("d");

    $this->db->select_sum("jumlah");
    $this->db->where(["id_kantor" => $data['user']['kantor_id'], "day(tanggal)" => $tanggal]);
    $query = $this->db->get("worksheet");
    
      return $query->row()->jumlah;
    
    
  }

  public function countAllWorksheet(){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    $this->db->where("id_kantor", $data['user']['kantor_id']);
    return $this->db->get('worksheet')->num_rows();
  }

  public function getJenisPembayaran(){
    $this->db->select("id, kode_jenis_pembayaran, nama_jenis_pembayaran");
    $query = $this->db->get("jenis_pembayaran");
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
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $jenis_biaya = $this->input->post('kode');
    $keterangan = $this->input->post('keterangan');
    $jumlah = $this->input->post('jumlah');
    $jenis_pembayaran = $this->input->post("id_jenis_pembayaran");

    $data = [
      'jenis_biaya' => $jenis_biaya,
      'keterangan' => $keterangan,
      'jumlah' => $jumlah,
      'id_kantor' => $data['user']['kantor_id'],
      'id_jenis_pembayaran' => $jenis_pembayaran,
      'created_by' => $data['user']['nama']
    ];

    $this->db->insert('worksheet', $data);

    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    if($jenis_pembayaran == 1){
      $this->db->select("saldo");
      $this->db->where('id_kantor', $data['user']['kantor_id']);
      $this->db->order_by("id", "desc");
      $laporan_kas = $this->db->get("laporan_kas_harian")->row();
      $saldo_kas = $laporan_kas->saldo - $jumlah;
      
      $data_laporan = [
        'keterangan' => $keterangan,
        'no_acc' => $jenis_biaya,
        'jumlah' => $jumlah,
        'keluar' => $jumlah,
        'saldo' => $saldo_kas,
        'id_kantor' => $data['user']['kantor_id'],
      ];

      $this->db->insert('laporan_kas_harian', $data_laporan);
    } else {
      $this->db->select("saldo");
      $this->db->order_by("id", "desc");
      $laporan_bank = $this->db->get("laporan_bank_harian")->row();
      $saldo_bank = $laporan_bank->saldo - $jumlah;

      $data_bank = [
        'keterangan' => $keterangan,
        'no_acc' => $jenis_biaya,
        'keluar' => $jumlah,
        'saldo' => $saldo_bank,
        'id_kantor' => $data['user']['kantor_id'],  
      ];

      $this->db->insert("laporan_bank_harian", $data_bank);

    } 
  }

}