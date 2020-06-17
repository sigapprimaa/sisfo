<?php

 /**
  * 
  */
 class UploadBerkas extends CI_Controller
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
 		$this->load->view('user/UploadBerkas');
 		$this->load->view('template/footer');
 	}

 	public function loadForm()
 	{
 		$keyword = $this->input->get("pilih"); 
 		$data['keyword'] =  $this->input->get("pilih"); 
 		$this->load->view("user/form-upload-berkas",$data);
 	}


 	public function upload()
 	{
 		//tempat menyimpan folder file upload
 		$directory = $this->input->post("direktory"); 


 		//nama table di database 
 		$nameColum = $this->input->post("nama_colom");


 		//config file yang akan di upload
 		$this->load->library('upload');
 		$config['allowed_types'] = 'jpg|png|jpeg|pdf' ;
 		$config['upload_path']  = './assets/upload/berkas/'.$directory . "/";
 		$config['overwrite'] = true ;
 		$config['file_name'] = $directory . $this->input->post('npk');
 			$this->upload->initialize($config);

 		if($this->upload->do_upload("file")){
 			$file = $this->upload->data('file_name');
 				$data = array(
 					$nameColum  => $file 
 				);
 				$where = array('id_karyawan' => $this->input->post('npk'));
 				$p = $this->m_karyawan->updateFile($data,'employe_karyawan',$where);
 					if($p){
 						echo "Sukses";
 					}
 		}
 	}


 	public function Formskill()
 	{ 
 		echo "Hallo";

 	}
 }