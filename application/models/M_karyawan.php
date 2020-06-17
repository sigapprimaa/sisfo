<?php

 /**
  *
  */
 class M_karyawan extends CI_Model
 {

    //ambil data karyawan 
    public function getData1($table)
    {
      return $this->db->get($table);
    }

   //ambil data Karyawan berdasarkan npk
   public function getData($npk,$table)
   {
     return $this->db->get_where($table,array('npk' => $npk));
   }



   //ganti password user

   public function updatePass($where,$data)
   {
   		$this->db->where($where);
   		return $this->db->update('akun',$data);
   }




    //update data kelengkapan  file upload karyawan
   public function updateFile($data,$table,$where)
   {
      $this->db->where($where);
      return $this->db->update($table,$data);
   }


   //ambil data history pkwt karyawan
   public function getHistory($where,$table)
   {
      return $this->db->get_where($table, $where);
   }

   //tambah skil dan pengalaman user/anggota
   public function addSkil($data,$table)
   {
      return $this->db->insert($table,$data);
   }

   //hapus skill lama dan pengalaman kerja lama
   public function delSkill($where,$table)
   {
      $this->db->where($where);
      return $this->db->delete($table);
   }


   //cek data log_aktivitas 
   public function addLog($data)
   {
      return $this->db->insert("log_login",$data);
   }

   //cek log aktivitas hari ini 
   public function cekLog($npk,$tanggal)
   {
      return $this->db->get_where('log_login',array('id_karyawan' => $npk , 'tanggal' => $tanggal));
   }

   //update log_aktivitas user 
   public function updateLog($data,$where)
   {
      $this->db->where($where);
      return $this->db->update("log_login",$data);
   }

 }
