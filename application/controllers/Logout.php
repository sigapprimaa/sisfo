<?php


/**
 * 
 */
class Logout extends CI_Controller
{
	public function index()
	{

		date_default_timezone_set('Asia/Jakarta');
		$npk = $this->session->userdata("id_karyawan");
    	$tanggal = date('Y-m-d'); 
   		$cekLog = $this->m_karyawan->cekLog($npk,$tanggal)->num_rows();
		if($cekLog == 1 ){
        $data = array(
          'id_karyawan'   => $npk ,
          'logout'        => date('H:i:s'),
        );
        $p =  $this->m_karyawan->cekLog($npk,$tanggal)->row();
        $where = array('id'  => $p->id );
        $this->m_karyawan->updateLog($data,$where);
      }else {
       // echo "Kondisi kedua";
      }

     
		$this->session->sess_destroy();
		redirect("Login");

		
	}
}