<?php

class Dokumen extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $role = $this->session->userdata('role_id');
      
      if(empty($role)){
        $this->session->userdata("logout","Sesi Berakhir");
        redirect('Login');
      }elseif($role != 3 ){
          redirect("superadmin/Dashboard");
      }
      
  }


  public function index()
  {
    
    $where = array('id_karyawan'  => $this->session->userdata("npk"));
    $data['berkas']  = $this->m_karyawan->getHistory($where,"employe_karyawan")->row();
    $this->load->view('template/header');
    $this->load->view('user/dokumen',$data);
    $this->load->view('template/footer');
  }


  
}
