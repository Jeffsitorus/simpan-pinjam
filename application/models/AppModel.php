<?php

defined('BASEPATH')OR exit('No direct script access allowed');


class AppModel extends CI_Model
{

  // get data --------------------->
  public function getNasabah()
  {
    $result   = $this->db->get('nasabah');
    return $result->result_array();
  }   

  public function getDataNasabah()
  {
    $this->db->select('*');
    $this->db->from('nasabah');
    $this->db->where('upload_ktp !=', null);
    $result   = $this->db->get();
    return $result->result_array();
  }
  public function getIdNasabah($id)
  {
    $row  = $this->db->get_where('nasabah', ['id_nasabah' => $id]);
    return $row->row_array();
  }

  public function getUserdataAdmin()
  {
    return $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
  }

  public function getSimpananNasabah($id)
  {
    $this->db->select('*');
    $this->db->from('simpanan');
    $this->db->join('nasabah','nasabah.id_nasabah=simpanan.nasabah_id','LEFT');
    $this->db->where('nasabah_id', $id);
    $result   = $this->db->get();
    return $result->result_array();
  }

  public function getTotalSimpanan($id)
  {
    $this->db->select_sum('total');
    $this->db->where('nasabah_id', $id);
    $this->db->where('status', 1);
    $result = $this->db->get('simpanan');
    return $result->row();
  }

  public function getAllTotalSimpanan()
  {
    $this->db->select_sum('total');
    $this->db->where('status',1);
    $result = $this->db->get('simpanan');
    return $result->row();
  }

  public function getTotalNasabah()
  {
    return $this->db->count_all_results('nasabah');
  }

  public function getAllSimpanan()
  {
    $this->db->select('*');
    $this->db->from('simpanan');
    $this->db->join('nasabah', 'nasabah.id_nasabah=simpanan.nasabah_id', 'LEFT');
    $result   = $this->db->get();
    return $result->result_array();
  }

  public function getPinjamanNasabah($id)
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('nasabah', 'nasabah.id_nasabah=peminjaman.nasabah_id', 'LEFT');
    $this->db->where('nasabah_id', $id);
    $result   = $this->db->get();
    return $result->result_array();
  }

  public function getTotalPinjamanNasabah($id)
  {
    $this->db->select_sum('nominal');
    $this->db->where('nasabah_id', $id);
    $this->db->where('status', 1);
    $result = $this->db->get('peminjaman');
    return $result->row();
  }

  public function getIdPeminjaman($id)
  {
    $row  = $this->db->get_where('peminjaman', ['id' => $id]);
    return $row->row_array();
  }

  public function getIdSimpanan($id)
  {
    $row = $this->db->get_where('simpanan',['id_simpanan' => $id]);
    return $row->row_array();
  }

  public function getAllPeminjaman()
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('nasabah', 'nasabah.id_nasabah=peminjaman.nasabah_id', 'LEFT');
    $result   = $this->db->get();
    return $result->result_array();
  }

  public function getAllPeminjamanSelesai()
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('nasabah', 'nasabah.id_nasabah=peminjaman.nasabah_id', 'LEFT');
    $this->db->where('status',1);
    $result   = $this->db->get();
    return $result->result_array();
  }

  public function getAllTotalPeminjaman()
  {
    $this->db->select_sum('nominal');
    $this->db->where('status', 1);
    $result = $this->db->get('peminjaman');
    return $result->row();
  }

  public function getTotalSimpananMax()
  {
    $this->db->select_sum('total');
    $this->db->select_max('total');
    $this->db->where('status', 1);
    $result = $this->db->get('simpanan');
    return $result->row();
  }

  public function getTotalPinjamanMax()
  {
    $this->db->select_sum('nominal');
    $this->db->select_max('nominal');
    $this->db->where('status', 1);
    $result = $this->db->get('peminjaman');
    return $result->row();
  }
  // end get data <-----------------

  // insert data ------------------>
  public function insertNasabah($data)
  {
    $this->db->insert('nasabah', $data);
  }

  public function insertSimpanan($data)
  {
    $this->db->insert('simpanan', $data);
  }
  public function insertPinjaman($data)
  {
    $this->db->insert('peminjaman', $data);
  } 
  // end insert data <--------------

  //  update data ----------------->
  public function updateNasabah($row, $data)
  {
    $this->db->where($row);
    $this->db->update('nasabah', $data);
  }

  public function updatePinjaman($row, $data)
  {
    $this->db->where($row);
    $this->db->update('peminjaman',$data);
  }

  public function updateSimpanan($row, $data)
  {
    $this->db->where($row);
    $this->db->update('simpanan', $data);
  }
  // end update data <-------------

  // delete data ------------------>
  public function deleteNasabah($row)
  {
    $this->db->where($row);
    $this->db->delete('nasabah');
  }

  public function deleteSimpanan($id)
  {
    $this->db->where('id_simpanan', $id);
    $this->db->delete('simpanan');
  }

  public function deletePinjaman($row)
  {
    $this->db->where($row);
    $this->db->delete('peminjaman');
  }
  // end delete data <-------------
}