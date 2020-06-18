<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model 
{
  public function checkUser($username, $password)
  {
    $username = set_value('username');
    $password = set_value('password');
    $result   = $this->db->where('username', $username)->where('password', md5($password))->limit(1)->get('admin');
    if ($result->num_rows() > 0) {
    return $result->row_array();
    } else {
    return false;
    }
  }

  public function insertNasabah($data)
  {
    $this->db->insert('nasabah',$data);
  }

  public function checkNasabah($username, $password)
  {
    $username   = set_value('username');
    $password   = set_value('password');
    $result     = $this->db->where('username', $username)->where('password', md5($password))->limit(1)->get('nasabah');
    if($result->num_rows() > 0) {
      return $result->row_array();
    } else {
      return false;
    }
  }
}


/* End of file authmodel.php */
