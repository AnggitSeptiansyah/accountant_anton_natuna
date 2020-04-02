<?php

class Pelanggan_model extends CI_Model {
 
  public function getAllPelanggan($limit, $start, $keyword = null){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    
    if($keyword){
      $this->db->like('kode_pelanggan', $keyword);
      $this->db->or_like('nama_pelanggan', $keyword);
      $this->db->where("id_kantor", $data['user']['kantor_id']);
    }

    $this->db->select("id, kode_pelanggan, nama_pelanggan, alamat, telp");
    $this->db->where("id_kantor", $data['user']['kantor_id']);
    $query = $this->db->get("pelanggan", $limit, $start);
    return $query->result_array();  
  }

  public function countAllPelanggan() {
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->db->where("id_kantor", $data['user']['kantor_id']);
    return $this->db->get('pelanggan')->num_rows();
  }

  public function tambahPelanggan(){

    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $data = [
      'kode_pelanggan' => $this->input->post('kode_pelanggan'),
      'nama_pelanggan' => $this->input->post('nama'),
      'alamat' => $this->input->post('alamat'),
      'telp' => $this->input->post('telepon'),
      'id_kantor' => $data['user']['kantor_id']
    ];

    $this->db->insert('pelanggan', $data);
  }

  public function ubahPelanggan(){
    $data = [
      'kode_pelanggan' => $this->input->post('kode_pelanggan', true),
      'nama_pelanggan' => $this->input->post('nama', true),
      'alamat' => $this->input->post('alamat', true),
      'telp' => $this->input->post('telepon', true),
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('pelanggan', $data);
  }

  public function getDetailPelanggan($id){
    return $this->db->get_where('pelanggan', ['id'=>$id])->row_array();
  }

  public function getTransaksiPelanggan($id){
    return $this->db->get_where('transaksi', ['costumer_id' => $id])->result_array();
  }


}