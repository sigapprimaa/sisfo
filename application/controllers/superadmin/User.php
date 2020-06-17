<?php


/**
 * 
 */
class User extends CI_Controller
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


	//tampilkan akun user anggota
	public function index()
	{
		$data['akun'] = $this->m_admin->getData('akun')->result();
		$this->load->view('template/header');
		$this->load->view('superadmin/akun',$data);
		$this->load->view('template/footer');
	}


	public function update()
	{
		$npk = $this->input->post('npk'); 
		$pass = $this->input->post('pass');
		$email = $this->input->post('email');

			if($pass == ""){
				$data = array(
					'npk' => $npk,
					'email' => $email
				);
				$where = array('npk' => $npk);
				$this->m_admin->updatePassword($where,$data);
				echo "Sukses";
			}else {
				$data = array(
					'npk' => $npk,
					'pass' => $pass,
					'email' => $email
				);
				$where = array('npk' => $npk);
				$this->m_admin->updatePassword($where,$data);
				echo "Sukses";
			}
	}
}