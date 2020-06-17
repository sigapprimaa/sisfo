<?php

class Dashboard extends CI_Controller{

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
    date_default_timezone_set('Asia/Jakarta');
    // // $data  = $this->user_model->ambil_data($this->session->userdata['usernam']);
    // // $data  = array (
    // //     'username' => $data->username,
    // //     'level'    =. $data->level.
    // )

    //cek log aktifitas hari ini
    $npk = $this->session->userdata("id_karyawan");
    $tanggal = date('Y-m-d'); 
    $cekLog = $this->m_karyawan->cekLog($npk,$tanggal)->num_rows();

      if($cekLog == 0 ){
        $data = array(
          'id_karyawan'   => $npk ,
          'login'         => $this->session->userdata("jamlogin"),
          'tanggal'       => date('Y-m-d'),
        );
        $this->m_karyawan->addLog($data);
      }elseif($cekLog == 1 ){
        $data = array(
          'id_karyawan'   => $npk ,
          'login'         =>$this->session->userdata("jamlogin"),
          'logout'        => NULL
        );
        $p = $this->m_karyawan->cekLog($npk,$tanggal)->row();
        $where = array('id'  => $p->id );
        $this->m_karyawan->updateLog($data,$where);
      }

    $this->load->view('template/header');
    $this->load->view('user/dashboard');
    $this->load->view('template/footer');

    
  }
}
