<?php

class LaporanBankHarian_model extends CI_Model {

  public function getAllDataLaporanBank($limit, $start, $keyword = null){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    if( $keyword ){
      $this->db->like('no_acc', $keyword);
      $this->db->or_like('keterangan', $keyword);
      $this->db->or_like('nama_pelanggan', $keyword);
      $this->db->or_like('kode_pelanggan', $keyword);
    }

    $this->db->select("laporan_bank_harian.*, pelanggan.nama_pelanggan, pelanggan.kode_pelanggan");
    $this->db->join('pelanggan', 'pelanggan.id = laporan_bank_harian.id_pelanggan', 'left');
    $query = $this->db->get('laporan_bank_harian', $limit, $start,);
    return $query->result_array();
  }

  public function countAllLaporanBank(){
    return $this->db->get('laporan_bank_harian')->num_rows();
  }

  public function getDataKantor(){
    $this->db->select("id, nama_cabang");
    $query = $this->db->get("cabang_kantor");
    return $query->result_array();
  }

  public function transferKeKas(){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $keterangan = $this->input->post("keterangan", true);
    $total_transfer = $this->input->post("total_transfer", true);
    $id_kantor = $this->input->post("id_kantor", true);

    if($total_transfer > 0) {
      $data_setor = [
        'id_kantor' => $id_kantor,
        'keterangan' => $keterangan,
        'total_transfer' => $total_transfer,
        'created_by' => $data['user']['nama'],
      ];

      $this->db->insert("transfer_ke_kas", $data_setor);

      $this->db->select("saldo");
      $this->db->order_by("id", "desc");
      $saldoTerakhirLaporanBank = $this->db->get("laporan_bank_harian")->row();

      $saldo_laporan_bank = $saldoTerakhirLaporanBank->saldo - $total_transfer;

      $pengurangan_saldo_bank = [
        'keterangan' => $keterangan,
        'keluar' => $total_transfer,
        'saldo' => $saldo_laporan_bank,
        'id_kantor' => $id_kantor,
      ];

      $this->db->insert("laporan_bank_harian", $pengurangan_saldo_bank);


      $this->db->select("saldo");
      $this->db->where("id_kantor", $id_kantor);
      $this->db->order_by("id", "desc");

      $laporan_kas = $this->db->get("laporan_kas_harian")->row();

      $saldo_kas_terakhir = $laporan_kas->saldo + $total_transfer;

      $penambahan_kas = [
        'id_kantor' => $id_kantor,
        'keterangan' => 'Terima Setoran',
        'jumlah' => $total_transfer,
        'masuk' => $total_transfer,
        'saldo' => $saldo_kas_terakhir,
      ];

      $this->db->insert("laporan_kas_harian", $penambahan_kas);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Transfer karena data = 0</div>');
      redirect('LaporanKasHarian');
    }
  }

}
