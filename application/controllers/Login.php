<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */


class Login extends CI_Controller
{

	public function __construct()
	  {
	    parent::__construct();

	    $role = $this->session->userdata('role_id');
	        if(!empty($this->session->userdata('npk')) && $role == 1 ){
	           redirect('superadmin/Dashboard');
	        }elseif(!empty($this->session->userdata('npk')) && $role == 3 ){
	           redirect('user/Dashboard');
	        }

	  }


	public function index()
	{

		$this->load->view('Login');
		//echo md5(123);
	}




	public function cekLogin()
	{
		date_default_timezone_set('Asia/Jakarta');
		$username 		= $this->input->post('npk');
		$password   = md5($this->input->post('pass'));

		$auth = $this->login_model->cek_login($username, $password)->num_rows();

		if($auth > 0){

			$user = $this->login_model->cek_login($username, $password)->row();
				if($user->pass == md5(123)){
					redirect("user/Auth");
				}else {
					$this->session->set_userdata('id_karyawan',$user->id_karyawan);
					$this->session->set_userdata('npk',$user->npk);
					$this->session->set_userdata('role_id',$user->role_id);
					$this->session->set_userdata("jamlogin",date("H:i:s"));
					switch ($user->role_id) {
						case '1':
							redirect('superadmin/Dashboard');
							break;
						case '2':
							redirect('arh/Dashboard');
							break;
						case '3':
							redirect('user/Dashboard');
							break;

						default:
							# code...
							break;
				}


			}
		}else {

			if($user->npk != $username){
				$this->session->set_flashdata('npk','Data Tidak ada');
				redirect("Login");
			}else if ($user->pass != $password){
				$this->session->set_flashdata('pass','Data Tidak ada');
				redirect("Login");
			}else {
				$this->session->set_flashdata('empty','Data Tidak ada');
				redirect("Login");
			}


		}




	}
}
