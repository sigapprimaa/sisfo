<?php

class Login_model extends CI_Model{
  

  public function cek_login($username, $password)
  {
     return $this->db->get_where('akun',array('npk' => $username , 'pass' => $password));
  }



}
