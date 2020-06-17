
 <?php


 /**
  * 
  */
 class Profile extends CI_Controller
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
 		$where = array('id_karyawan'	=> $this->session->userdata('id_karyawan'));
 		$data['img'] = $this->db->get_where('employe_karyawan',array('id_karyawan' => $this->session->userdata('id_karyawan')))->row();
 		$this->load->view("template/header");
 		$this->load->view("user/profile",$data);
 		$this->load->view("template/footer");
 	}

 	public function update()
 	{	
 		$directory = "Poto" ;
 		$this->load->library('upload');
 		$config['allowed_types'] = 'jpg|png|jpeg|pdf' ;
 		$config['upload_path']  = './assets/upload/berkas/Poto/';
 		$config['overwrite'] = true ;
 		$config['file_name'] = $directory . $this->input->post('npk');
 			$this->upload->initialize($config);

 		if($this->upload->do_upload("photo")){
 			$file = $this->upload->data('file_name');
 			$data = array(
 				'photo'		=> $file 
 			);

 			$where = array('id_karyawan'  => $this->session->userdata('id_karyawan'));
 			$update = $this->m_karyawan->updateFile($data,'employe_karyawan',$where);
 				if($update){
 					echo "Sukses";
 				}else {
 					echo "Gagal";
 				}
 		}


 	}
 }