<?php 


 /**
  * 
  */
 class Akun extends CI_Controller
 {

  public function __construct()
  {
    parent::__construct();

    $role = $this->session->userdata('role_id');
      
      if(empty($role)){
        $this->session->userdata("logout","Sesi Berakhir");
        redirect('Login');
      }elseif($role != 1 ){
          redirect("user/Dashboard");
      }
      
  }

 	//load data akun user
 	public function user()
 	{

 		$this->load->library('pagination');

	    if($this->input->post('submit')){
	      $data['keyword']  = $this->input->post('keyword');
	      $this->session->set_userdata('keyword',$data['keyword']);
	    }else {
	      $data['keyword'] = $this->session->userdata('keyword') ;
	    }

	   $this->db->like('npk',$data['keyword']);
	   $this->db->or_like('email' , $data['keyword']);
	   $this->db->where("role_id" , 3);
	   $this->db->from('akun');
	   	$config['base_url']  =  'http://localhost/sisfo_data/superadmin/Akun/user/index/' ;
	    $config['total_rows'] = $this->db->count_all_results();
	    $config['per_page']  = 7 ;

	    //initialize
	    $this->pagination->initialize($config);
	    $data['pagination'] = $this->pagination->create_links();

	    $data['result'] = $config['total_rows'];
	    $data['start'] = $this->uri->segment(5) ;
	    $data['no'] = $data['start'];
	    $data['akun'] = $this->m_admin->pageUser('akun',$config['per_page'],$data['start'],$data['keyword']);
 		


 		$where = array('role_id'  => 3);
 	//	$data['akun'] = $this->m_admin->roleUser($where)->result();
 		$this->load->view('template/header');
 		$this->load->view('superadmin/user',$data);
 		$this->load->view('template/footer');
 	}

 	//kirim data user ke ajax
 	public function sendUser()
 	{
 		$data = $this->db->get_where("akun" , ['role_id' => 3])->result();
 		echo json_encode($data);
 	}

 	//tambah akun user anggota
 	public function addUser()
 	{

 		//cek ada apa tidak di master karyawan
 		$where = array('npk' => $this->input->post('npk'));
 		$cekMaster = $this->db->get_where("karyawan", $where)->num_rows();
 		$cekAkun = $this->db->get_where("akun", $where)->num_rows();

 		

 		if($cekAkun == 1 )  {
 			echo "ada";
 		}elseif($cekMaster > 0 ){
 				$data = array(
		 			'npk'			=> $this->input->post("npk"),	
		 			'id_karyawan'	=> $this->input->post("npk"),
		 			'email'			=> $this->input->post("email"),
		 			'pass'			=> $this->input->post("pass"),
		 			'role_id'		=> 3  
 				);
		 		$p = $this->m_admin->addArhuser($data,"akun");
		 			if($p){
		 				echo "Sukses";
		 			}else {
		 				echo "Gagal input";
		 			}
 		}else {
 			echo "Gagal";
 		}

 		
 	}


 	//update data akun user anggota
 	public function updateUser()
 	{
 		$pass = $this->input->post("pass");
 		$where = array('id' => $this->input->post("id")) ; 
 			if($pass == ""){
		 		$data = array(
		 			'npk'		=> $this->input->post("npk"),
		 			'id'		=> $this->input->post("id"),
		 			'email'		=> $this->input->post("email")
		 		);
		 		$this->m_admin->updatePassword($where,$data);
		 		echo "Sukses";
 			}else {
 				$data = array(
		 			'npk'		=> $this->input->post("npk"),
		 			'id'		=> $this->input->post("id"),
		 			'email'		=> $this->input->post("email"),
		 			'pass'		=> $pass 
		 		);

		 		$this->m_admin->updatePassword($where,$data);
		 		echo "Sukses";
 			}
 	}


 	//hapus akun user anggota
 	public function deleteUser()
 	{
 		$where =  array('id' => $this->input->post("id") );
 		$this->m_admin->hapusAkun($where);
 		echo "Sukses";

 	}

 }