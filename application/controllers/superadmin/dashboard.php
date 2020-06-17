<?php


class Dashboard extends CI_Controller
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

  public function index()
  {
    date_default_timezone_set('Asia/Jakarta');
    //ambil nama user login
    $data['data'] = $this->db->get_where('karyawan',array('npk' => $this->session->userdata('npk')))->row();


    //jumlah anggota kontrak keanggotaan PT SIGAP 
    $kontrak = array('status' => 'Kontrak');
    $permanen = array('status' => 'Tetap');
    $data['countKontrak'] = $this->m_admin->infoDashboard('employe_karyawan',$kontrak)->num_rows();
    $data['countPermanen'] = $this->m_admin->infoDashboard('employe_karyawan',$permanen)->num_rows();
    $data['countAll'] = $this->m_admin->getData("employe_karyawan")->num_rows();


    //tampilkan user log aktivitas login 
    $tgl = array('tanggal'  => date('Y-m-d'));
    $data['log_user']  = $this->m_admin->infoDashboard("log_login",$tgl)->num_rows();
    $data['log_user_login']  = $this->m_admin->infoLogin("log_login",$tgl)->result();
    $this->load->view('template/header');
    $this->load->view('superadmin/dashboard',$data);
    $this->load->view('template/footer');
  }

}
