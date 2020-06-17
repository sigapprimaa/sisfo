<?php

 /**
  * 
  */
 class Gantipass extends CI_Controller
 {

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
 		$this->load->view('template/header');
 		$this->load->view('user/gantipassword');
 		$this->load->view('template/footer');
 	}


 	public function update()
 	{
 		$pass = md5($this->input->post('pass'));
 		$where = array('npk' => $this->input->post('npk'));
 		$data = array('pass' => $pass);

 		$p = $this->m_karyawan->updatePass($where,$data);
 		if($p){
 			echo "Sukses";
 		}
 	}
 }