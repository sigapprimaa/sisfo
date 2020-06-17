<?php

class Pkwt extends CI_Controller{

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

    $this->load->library('pagination');

    if($this->input->post('submit')){
      $data['keyword']  = $this->input->post('keyword');
      $this->session->set_userdata('keyword',$data['keyword']);
    }else {
      $data['keyword'] = $this->session->userdata('keyword') ;
    }

   $config['base_url']  =  'http://localhost/sisfo_data/superadmin/Pkwt/index/' ;
   $this->db->like('npk_br',$data['keyword']);
   $this->db->or_like('nama' , $data['keyword']);
   $this->db->from('pkwt');
    $config['total_rows'] = $this->db->count_all_results();
    $config['per_page']  = 10 ;

    //initialize 
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();

    $data['result'] = $config['total_rows'];
    $data['start'] = $this->uri->segment(4) ;
    $data['no'] = $data['start'];
    $data['item'] = $this->m_admin->pageData('pkwt',$config['per_page'],$data['start'],$data['keyword']);
    $this->load->view('template/header');
    $this->load->view('superadmin/pkwt',$data);
    $this->load->view('template/footer');
  }


  public function upload()
  {
      $this->load->library('upload');
      $config['upload_path']    = './assets/upload/backup_pkwt/';
      $config['allowed_types']  ='*';
      $config['overwrite']      = true ;
      $config['file_name']      = $this->input->post('pkwt') .'-'. $this->input->post('npk');
      $this->upload->initialize($config);
        if ($this->upload->do_upload('file_pkwt')) {
          //jika berhasil
          $file = $this->upload->data('file_name');
          $where = $this->input->post('npk');
          $data = array('file_pkwt'  => $file );
          $this->m_admin->statPKWT($where,$data);
          echo "sukses";
        }else{
          echo $this->upload->display_errors();
        }
/*
        $name = array() ;
        $this->load->library('upload');
          $config['upload_path']    = './assets/upload/backup_pkwt/';
          $config['allowed_types']  ='pdf|xlsx|jpg|jpeg|png';
          $config['overwrite']      = true ;

          $name = array('file_pkwt','ijazah');
          for ($i=0; $i < count($name) ; $i++) { 
            $config['file_name'] = $name[$i] . "-" . $this->input->post("pkwt") . "-" . $this->input->post("npk") ;
            $this->upload->initialize($config);

            if($this->upload->do_upload($name[$i])) {
                $where = $this->input->post('npk') ;
                $data = array(
                    $name[$i]  => $this->upload->data('file_name') ,
                );
                $this->m_admin->statPKWT($where,$data);
                echo "sukses";
            }else {
               echo $this->upload->display_errors();
            }
          }*/

  }

  public function delete()
  {
    $where = $_POST['id'] ;
    $this->m_admin->delPKWTupload($where);
    
  }


  public function backup()
  {
   $where = $_POST['id'] ;
    $item = $this->db->get_where('pkwt', array('id' => $where))->row();
    
      $data = array(
        'id_karyawan'  => $item->npk_br,
        'no'           => $item->no,
        'pkwt'         => $item->pkwt,
        'hari'         => $item->hari,
        'tgl'          => $item->tgl,
        'terbilang'    => $item->terbilang,
        'nama'         => $item->nama,
        'alamat'       => $item->alamat,
        'kelurahan'    => $item->kelurahan,
        'kecamatan'    => $item->kecamatan,
        'kota'         => $item->kota,
        'no_ktp'       => $item->no_ktp,
        'npk_lm'       => $item->npk_lm,
        'npk_br'       => $item->npk_br,
        'tempat_tugas' => $item->tempat_tugas,
        'cabang'       => $item->cabang,
        'start'        => $item->start,
        'terbilang_1'  => $item->terbilang_1,
        'end_date'     => $item->end_date,
        'terbilang_2'  => $item->terbilang_2,
        'gp'           => $item->gp,
        'terbilang_3'  => $item->terbilang_3,
        'bank'         => $item->bank,
        'rekening'     => $item->rekening,
        'kode_post'    => $item->kode_post,
        'file_pkwt'    => $item->file_pkwt,
        'status_pp'    => $item->status_pp,
        'pihak_pertama'=> $item->pihak_pertama,
        'arh'          => $item->arh,
      );

      $where2 = array('id_karyawan'  => $item->npk_br);
      $data2 = array(
          'instalasi'   => $item->tempat_tugas ,
      );


    //masukan data ke history pkwt 
     $this->m_admin->insertHistoryPKWT($data);

     //hapus data dari tabel pkwt 
     $this->m_admin->delPKWTupload($where);

     //update instalasi / tempat tugas berdasarkan data pkwt 
     $this->m_admin->updateInstalasi($data2,$where2,"employe_karyawan");
      echo "Backup Sukses";
  }

}
