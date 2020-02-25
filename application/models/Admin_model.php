<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

  public function getAllAdmin(){
    $query = "
      SELECT `admin`.*, `jabatan_admin`.`nama_jabatan`
      FROM `admin` JOIN `jabatan_admin`
      ON `admin`.`jabatan_id` = `jabatan_admin`.`id`
    ";

    return $this->db->query($query)->result_array();
  }

  public function tambahAdmin(){
    $data = [
      'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'jabatan_id' => $this->input->post('jabatan_id'),
      'date_created' => time()
    ];

    $this->db->insert('admin', $data);
  }
}