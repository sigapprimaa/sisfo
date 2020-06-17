<?php

class Auth extends CI_Controller{
  

  public function index()
  {
      $this->load->view("user/authentifikasi");
  }


  public function update()
  {

      $password = md5($this->input->post("pass"));
      $npk = $this->input->post("npk");
      $ceknpk = $this->db->get_where("akun", array('id_karyawan'  => $npk))->num_rows();

        if($ceknpk == 0){
          echo "Gagal";
        }else {
          $where = array('npk' => $this->input->post('npk'));
          $data = array('pass' => $password);
          $p = $this->m_karyawan->updatePass($where,$data); 
            if($p){
              echo "Sukses";
            }else {
              echo "Gagal";
            }
        }
  }

}
