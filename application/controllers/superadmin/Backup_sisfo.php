<?php



 /**
  * 
  */
 class Backup_sisfo extends CI_Controller
 {
 	public function index()
 	{
 			$this->load->dbutil();

 			$backup = $this->dbutil->backup();


 			$this->load->helper('file');
 			write_file('./assets/BackupDB/sisfo.zip', $backup);

 			$this->load->helper("download");
 			force_download('sisfo.zip' , $backup) ;
 	}
 }