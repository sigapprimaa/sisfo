<?php

/**
 *
 */
class Taliasih extends CI_Controller
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
  	$data['result'] = $this->m_admin->getData('taliasih')->result();
    $this->load->view('template/header');
    $this->load->view('superadmin/taliasih',$data);
    $this->load->view('template/footer');
  }


  //backup data
  public function backup()
  {
  	$where = $this->input->post('id');
  	$item = $this->db->get_where('taliasih', array('id' => $where))->row();

  		$data = array(

  			    'id_karyawan'       => $item->id_karyawan,
            'no'                => $item->no,
            'npk'               => $item->npk,
            'nama'              => $item->nama,
            'tempat_tugas'      => $item->tempat_tugas,
            'cabang'            => $item->cabang,
            'alamat'            => $item->alamat,
            'kelurahan'         => $item->kelurahan,
            'kecamatan'         => $item->kecamatan,
            'kota'              => $item->kota,
            'no_ktp'            => $item->no_ktp,
            'tali_asih'         => $item->tali_asih,
            'terbilang_3'       => $item->terbilang_3,
            'account'           => $item->account,
            'bank'              => $item->bank ,
            'file_taliasih'     => $item->file_taliasih,
            'pihak_pertama'     => $item->pihak_pertama,
            'status_pp'         => $item->status_pp,
            'surat_kuasa'       => $item->surat_kuasa,
            'tgl_kuasa'         => $item->tgl_kuasa,
            'tgl_terbilang'     => $item->tgl_terbilang,
            'tgl_dibayar'       => $item->tgl_dibayar,
            'tbl_terbilang'     => $item->tbl_terbilang,
            'tanggal'           => $item->tanggal,
            'no_surat'          => $item->no_surat,
            'tgl_berakhir'      => $item->tgl_berakhir,
            'tbl_kuasa'         => $item->tbl_kuasa,
  		);

  	 $this->m_admin->insertHistoryTaliasih($data);
     $this->m_admin->delTaliasihupload($where);
     echo "Backup Sukses";
  }


  //upload taliasih tertanda tangan
  public function upload()
  {
  	   date_default_timezone_set('Asia/Jakarta');
  			$this->load->library('upload');
  		$where = $this->input->post('id');
      $nama = $this->db->get_where("taliasih", array('id' => $where))->row();
		  $config['upload_path']    = './assets/upload/backup_taliasih/';
          $config['allowed_types']  ='*';
          $config['overwrite']      = true ;
          $config['file_name']      =  $nama->no . 'PB' . $this->input->post("npk") . date("Ymd");
  			$this->upload->initialize($config);
  				if($this->upload->do_upload('file_taliasih')){
  					$name = $this->upload->data('file_name');
            $data = array(
              'file_taliasih'   => $name
            );
  					 $update = $this->m_admin->updatePB($data,$where,"taliasih");
             if($update){
              echo "Sukses";
             }else {
              echo "Gagal";
             }
  				}
  }

  public function delete()
  {
    $where = $this->input->post('id');
    $this->m_admin->delTaliasihupload($where);
    echo "Data Terhapus";
  }







}
