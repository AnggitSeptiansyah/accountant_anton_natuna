<?php

class Piutang_model extends CI_Model{

  public function getAllPiutang($limit, $start){

    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();

    $this->db->select("piutang.*, pelanggan.nama_pelanggan, pelanggan.kode_pelanggan");
    $this->db->join('pelanggan', 'pelanggan.id = piutang.id_pelanggan', 'left');
    $this->db->where('piutang.id_kantor', $data['user']['kantor_id']);
    
    $query = $this->db->get("piutang", $limit, $start);
    if($query->num_rows() != 0){
      return $query->result_array();
    } else {
      return false;
    }
  }

  public function countAllPiutang(){
    $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata['email']])->row_array();
    $this->db->where("id_kantor", $data['user']['kantor_id']);
    return $this->db->get('piutang')->num_rows();
  }

  
}