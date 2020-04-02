<?php

class LaporanKasHarian_model extends CI_Model {

  public function getAllDataLaporan($limit, $start, $keyword = null){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    if( $keyword ){
      $this->db->like('no_acc', $keyword);
      $this->db->or_like('keterangan', $keyword);
      $this->db->or_like('nama_pelanggan', $keyword);
      $this->db->or_like('kode_pelanggan', $keyword);
    }

    $this->db->select("laporan_kas_harian.*, pelanggan.nama_pelanggan, pelanggan.kode_pelanggan");
    $this->db->join('pelanggan', 'pelanggan.id = laporan_kas_harian.id_pelanggan', 'left');
    $this->db->where('laporan_kas_harian.id_kantor', $data['user']['kantor_id']);
    $query = $this->db->get('laporan_kas_harian', $limit, $start);
    return $query->result_array();
  }

  public function countAllLaporanKas(){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    $this->db->where("id_kantor", $data['user']['kantor_id']);
    return $this->db->get('laporan_kas_harian')->num_rows();
  }

  public function setorKeBank(){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $total_setor = $this->input->post('total_setor', true);
    $keterangan = $this->input->post('keterangan', true);

    $data_setor = [
      'id_kantor' => $data['user']['kantor_id'],
      'total_setor' => $total_setor,
      'keterangan' => $keterangan,
      'created_by' => $data['user']['nama'],
    ];

    if($total_setor > 0){
      $this->db->insert("setor_ke_bank", $data_setor);
    }

    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->db->select("saldo");
    $this->db->where("id_kantor", $data['user']['kantor_id']);
    $this->db->order_by("id", "desc");

    $laporan_kas = $this->db->get("laporan_kas_harian")->row();

    if($laporan_kas->saldo <= 0){
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Uang Kas kurang dari 0, maka tidak dapat melakukan setoran</div>');
      redirect('LaporanKasHarian');
    }

    $saldo_kas_terakhir = $laporan_kas->saldo - $total_setor;

    $pengurangan_kas_laporan = [
      'id_kantor' => $data['user']['kantor_id'],
      'keterangan' => 'SETORAN',
      'jumlah' => $total_setor,
      'keluar' => $total_setor,
      'saldo' => $saldo_kas_terakhir,
    ];

    if($total_setor == 0){
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Setoran tidak dapat dilakukan karena jumlah setor = 0</div>');
      redirect('LaporanKasHarian');
    } else {
      $this->db->insert("laporan_kas_harian", $pengurangan_kas_laporan);
    }

    $this->db->select("saldo");
    $this->db->order_by("id", "desc");
    $laporan_bank = $this->db->get("laporan_bank_harian")->row();
    if($laporan_bank->saldo == 0){
      $saldo_bank = $total_setor;
    } else {
      $saldo_bank = $laporan_bank->saldo + $total_setor;
    }

    $hasil_setoran_ke_bank = [
      'keterangan' => 'Terima Setoran',
      'masuk' => $total_setor,
      'saldo' => $saldo_bank,
    ];

    $this->db->insert("laporan_bank_harian", $hasil_setoran_ke_bank);
    
  }


}