<?php

class Biodata extends CI_Controller{


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
      $npk = $this->session->userdata('id_karyawan') ;
      //ambil data diri karyawan 
      $data['item'] = $this->m_karyawan->getData($npk,'karyawan')->row();

      //get informasi data kelengkapan berkas karyawan
      $data['item2'] = $this->m_karyawan->getData($npk,'employe_karyawan')->row();

      //get data pendidikan karyawan
      $data['item3'] = $this->m_karyawan->getData($npk,'pendidikan')->row();

      //get keluarga anggota istri/suami
      $data['keluarga'] = $this->m_karyawan->getData($npk,'pasangan')->row();

      //get pengalaman user
      $data['pengalaman'] = $this->m_karyawan->getData($npk,'pengalaman')->result();

      //ambil data keahlian dari anggota
      $data['skill'] = $this->m_karyawan->getData($npk,'skill')->result();

      //ambil data anak dari anggota/user / karyawan
      $data['keluarga2'] = $this->m_karyawan->getData($npk,'anak')->result();


      //tampilkan data d modal
      $data['showModal'] = $this->m_karyawan->getData1("karyawan");
      $this->load->view('template/header.php');
      $this->load->view('user/biodata.php',$data);
      $this->load->view('template/footer.php');
  }



  public function update()
  {
    $where = array('id_karyawan'  => $this->input->post('id_karyawan') );
    
    
    //masukan data update karyawan ke array data 
    $data = array(
      'nama'              => $this->input->post("nama"),
      'tempat_lahir'      => $this->input->post("tempat_lahir"),
      'tgl_lahir'         => $this->input->post("tgl_lahir"),
      'agama'             => $this->input->post("agama"),
      'alamat'            => $this->input->post("alamat"),
      'nik'               => $this->input->post("nik"),
      'no_kk'             => $this->input->post("no_kk"),
      'celana'            => $this->input->post("celana"),
      'baju'              => $this->input->post("baju"),
      'sepatu'            => $this->input->post("sepatu")
    );


    $data2 = array(
      'pendidikan_terakhir'     => $this->input->post('pendidikan_terakhir'),
      'nama_sekolah'            => $this->input->post('nama_sekolah'),
      'jurusan'                 => $this->input->post('jurusan'),
      'tahun_lulus'             => $this->input->post('tahun_lulus'),
      'ipk'                     => $this->input->post('ipk'),
    );

    //input update karyawan 
    $updateInfouser = $this->m_karyawan->updateFile($data,"karyawan",$where);
    $updatePendidikanuser = $this->m_karyawan->updateFile($data2,"pendidikan",$where);


    //ambil data update skill user 
    $skill = $this->input->post('skill');
    $deleteSkill = $this->m_karyawan->delSkill($where,"skill");
     error_reporting(0);
      for ($i=0; $i < count($skill) ; $i++) { 

          if(empty($skill[$i])){
            echo "";
          }else {
              $data = array(
                  'npk'             => $this->session->userdata('id_karyawan'),
                  'id_karyawan'     => $this->session->userdata('id_karyawan'),
                  'skill'           => $skill[$i]
              );
              $this->m_karyawan->addSkil($data,"skill");
          }
          
      }

  



   //ambil data update pengalaman user 
    $pengalaman = $this->input->post('pengalaman');
    $deletepengalaman = $this->m_karyawan->delSkill($where,"pengalaman");
     error_reporting(0);
      for ($i=0; $i < count($pengalaman) ; $i++) { 

          if(empty($pengalaman[$i])){
            echo "";
          }else {
              $data = array(
                  'npk'             => $this->session->userdata('id_karyawan'),
                  'id_karyawan'     => $this->session->userdata('id_karyawan'),
                  'pengalaman'      => $pengalaman[$i]
              );
              $this->m_karyawan->addSkil($data,"pengalaman");
          }
          
      }


   echo "Sukses";


  }
}
