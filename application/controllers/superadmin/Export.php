<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Anggota.xls");

 /**
  * 
  */
 class Export extends CI_Controller
 {
 	public function index()
 	{
 		$data['output'] = $this->m_admin->joinExcel()->result();
 		$this->load->view("superadmin/Export",$data);
 	}
 }