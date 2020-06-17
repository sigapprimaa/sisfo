<?php


 /**
  * 
  */
 class Coba extends CI_Controller
 {
 	public function index()
 	{
 		$this->load->view('coba');
 	}


 	public function upload()
 	{
 
 	  $name = array() ;
 	  $this->load->library('upload');
      $config['upload_path']    = './assets/upload/backup_pkwt/';
      $config['allowed_types']  ='pdf|xlsx|jpg|jpeg|png';
      $config['overwrite']      = true ;

      $name = array('file_pkwt','ijazah');
      for ($i=0; $i < count($name) ; $i++) { 
      	$config['file_name'] = $name[$i] . "220258";
      	$d = $config['file_name'] ;
	    $this->upload->initialize($config);

	    if($this->upload->do_upload($name[$i])) {
		      $where = 220258 ;
		      $data = array(
		      		$name[$i]  => $this->upload->data('file_name') ,
		      );
		      $this->m_admin->statPKWT($where,$data);
		      echo "sukses";
	    }else {
	    	 echo $this->upload->display_errors();
	    }
      }



 	}

 }