<?php

  /**
   *
   */
  class Daftar_anggota extends CI_Controller
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

      //data history pkwt
      $data['history'] = $this->m_admin->getData('history_pkwt');

      
      $data['data'] = $this->m_admin->joinAnggota()->result();
      $this->load->view('template/header');
      $this->load->view('superadmin/daftar_anggota',$data);
      $this->load->view('template/footer');
    }

    public function getJoinKar()
    {
      $data = $this->m_admin->joinAnggota()->result();

      echo json_encode($data);

    }



    public function form_edit($npk)
    {
      $where = array('id_karyawan'  => $npk) ;
      //ambil data diri karyawan 
      $data['item'] = $this->m_admin->getKar('karyawan',$where)->row();

      //get informasi data kelengkapan berkas karyawan
      $data['item2'] = $this->m_admin->getKar('employe_karyawan',$where)->row();

      //get data pendidikan karyawan
      $data['item3'] =$this->m_admin->getKar('pendidikan',$where)->row();

      //get keluarga anggota istri/suami
      $data['keluarga'] = $this->m_admin->getKar('pasangan',$where)->row();

      //get pengalaman user
      $data['pengalaman'] = $this->m_admin->getKar('pengalaman',$where)->result();

      //ambil data keahlian dari anggota
      $data['skill'] = $this->m_admin->getKar('skill',$where)->result();

      //ambil data anak dari anggota/user / karyawan
      $data['keluarga2'] = $this->m_admin->getKar('anak',$where)->result();

      //data cari anak
      $data['cari_anak'] = $this->db->get_where("anak",$where)->result();

      $this->load->view("template/header");
      $this->load->view("superadmin/Edit_user",$data);
      $this->load->view("template/footer");
    }


    public function updateEmploye()
    {

      $where = array('id_karyawan'    => $this->input->post('id_karyawan'));

      $data = array(
          'status'              => $this->input->post('status'),
          'instalasi'           => $this->input->post('instalasi'),
          'posisi_status'       => $this->input->post('posisi_status'),
          'no_kta'              => $this->input->post('no_kta'),
          'arh1'                 => $this->input->post('arh'),
          'tgl_berakhir_kta'    => $this->input->post('tgl_berakhir_kta'),
          'gada_madya'          => $this->input->post('gada_madya'),
          'gada_pratama'        => $this->input->post('gada_pratama'),
          'status_pajak'        => $this->input->post('status_pajak'),
          'bpjs_kesehatan'      => $this->input->post('bpjs_kesehatan'),
          'bpjs_ktu'            => $this->input->post('bpjs_ktu'),
      );
      $data2 = array(
        'arh'  => $this->input->post('arh')
      );
     $p =  $this->m_admin->updateInstalasi($data,$where,'employe_karyawan');
     $q =  $this->m_admin->updateInstalasi($data2,$where,'karyawan');
      if($p && $q){
        echo "Sukses";
      }
    }


    public function updateBiodata()
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


        

        //input update karyawan 
        $updateInfouser =  $this->m_admin->updateInstalasi($data,$where,'karyawan');
        echo "Sukses";
    }


    public function updatePendidikan()
    {
        $where = array('id_karyawan'  => $this->input->post('id_karyawan') );
        $data2 = array(
            'pendidikan_terakhir'     => $this->input->post('pendidikan_terakhir'),
            'nama_sekolah'            => $this->input->post('nama_sekolah'),
            'jurusan'                 => $this->input->post('jurusan'),
            'tahun_lulus'             => $this->input->post('tahun_lulus'),
            'ipk'                     => $this->input->post('ipk'),
          );

        $updatePendidikanuser =  $this->m_admin->updateInstalasi($data2,$where,'pendidikan');
        if($updatePendidikanuser){
          echo "Sukses";
        }


        //ambil data update skill user 
    $skill = $this->input->post('skill');
    $deleteSkill = $this->m_admin->delPengalaman($where,"skill");
     error_reporting(0);
      for ($i=0; $i < count($skill) ; $i++) { 

          if(empty($skill[$i])){
            echo "";
          }else {
              $data = array(
                  'npk'             => $this->input->post('id_karyawan'),
                  'id_karyawan'     => $this->input->post('id_karyawan'),
                  'skill'           => $skill[$i]
              );
              $this->m_admin->addPengalaman($data,"skill");
          }
          
      }

  



   //ambil data update pengalaman user 
    $pengalaman = $this->input->post('pengalaman');
    $deleteSkill = $this->m_admin->delPengalaman($where,"pengalaman");
     error_reporting(0);
      for ($i=0; $i < count($pengalaman) ; $i++) { 

          if(empty($pengalaman[$i])){
            echo "";
          }else {
              $data = array(
                  'npk'             => $this->input->post('id_karyawan'),
                  'id_karyawan'     => $this->input->post('id_karyawan'),
                  'pengalaman'      => $pengalaman[$i]
              );
               $this->m_admin->addPengalaman($data,"pengalaman");
          }
          
      }

    }



    //update data pasangan user
    public function updatePasangan()
    {
        $where = array('id_karyawan'  => $this->input->post('id_karyawan') );
        
        //ambil data pasangan user 
        $data = array(
          'nama'      => $this->input->post('nama'),
          'nik'       => $this->input->post('nik'),
          'faskes'    => $this->input->post('faskes'),
          'no_bpjs'   => $this->input->post('no_bpjs')
        );

        $updatePasangan =  $this->m_admin->updateInstalasi($data,$where,'pasangan');

    }

    //load form tambah anak 
    public function loadFormAnak()
    {
      $total = $this->input->get("jumlah");

      for($i=0 ; $i < $total ; $i++){ ?>
        <label for="">Nama Lengkap</label>
          <input type="text" name="nama[]" id="nama" class="form-control"  placeholder="">
          <label for="">NIK</label>
          <input type="text" name="nik[]" id="nik" class="form-control"  placeholder="">

          <label for="">Faskes</label>
          <input type="text" name="faskes[]" id="faskes"  class="form-control" >

          <label for="">BPJS Kesehatan</label>
          <input type="text" name="no_bpjs[]" id="no_bpjs"  class="form-control" >
   <?php   }

    }


    public function addAnak()
    {
      $nama = $this->input->post('nama');
      $nik = $this->input->post('nik');
      $faskes = $this->input->post('faskes');
      $no_bpjs = $this->input->post('no_bpjs');

       error_reporting(0);
        $count = count($nama);
        for($i= 0 ; $i < $count ; $i++){
          $data = array(
            'nama'          => $nama[$i]  ,
            'id_karyawan'   => $this->input->post('id_karyawan')  ,
            'npk'           => $this->input->post('id_karyawan'),
            'nik'           => $nik[$i],
            'faskes'        => $faskes[$i] ,
            'no_bpjs'       => $no_bpjs[$i] 
          );
           $this->db->insert("anak",$data);
        }
        echo "Sukses";
    }


    public function LoadFormUpdateAnak()
    {
      $keyword = $this->input->get('keyword');
      $data = $this->m_admin->getNIKAnak($keyword)->row(); ?>

        <label for="">Nama Lengkap</label>
          <input type="hidden" name="key" value="<?= $keyword ?>">
          <input type="text" name="nama" value="<?= $data->nama ?>" id="namaAnak" class="form-control"  placeholder="">
          <label for="">NIK</label>
          <input type="text" name="nik" value="<?= $data->nik ?>" id="nik" class="form-control"  placeholder="">

          <label for="">Faskes</label>
          <input type="text" name="faskes" value="<?= $data->faskes ?>" id="faskes"  class="form-control" >

          <label for="">BPJS Kesehatan</label>
          <input type="text" name="no_bpjs" id="no_bpjs"  value="<?= $data->no_bpjs ?>" class="form-control" >
            </div>
            </div>
            <div class="modal-footer">
              <a href="javascript:del(<?= $data->nik ?>)" class="btn btn-danger" >Delete</a>
              <button type="submit"  class="btn btn-primary">Simpan Data</button>
           </form>
            </div>
<?php          
    }

    //update data anak user / anggota
    public function updateAnak()
    {
      $data = array(
            'nama'          => $this->input->post("nama") ,
            'id_karyawan'   => $this->input->post('id_karyawan')  ,
            'npk'           => $this->input->post('id_karyawan'),
            'nik'           => $this->input->post("nik") ,
            'faskes'        => $this->input->post("faskes")  ,
            'no_bpjs'       => $this->input->post("no_bpjs")  
          );
      $where = array('nik'  => $this->input->post('key') );
      $updateAnak =  $this->m_admin->updateInstalasi($data,$where,'anak');
        if($updateAnak){
          echo "Sukses";
        }else {
          echo "Gagal";
        }
    }

    //hapus data anak user/ anggota
    public function deleteAnak()
    {
      $nik = $this->input->get("nik");
      $where = array('nik'  => $nik );
      $deleteAnak = $this->m_admin->delPengalaman($where,"anak");
      if($deleteAnak){
        echo "Sukses";
      }
    }


    //hapus semua data anggota user
    public function destroyUser()
    {
      $id = $this->input->get("id");
      $where = array('id_karyawan'  => $id);

      //delete semua data karyawan 
      $this->m_admin->delPengalaman($where,"karyawan");
      $this->m_admin->delPengalaman($where,"employe_karyawan");
      $this->m_admin->delPengalaman($where,"skill");
      $this->m_admin->delPengalaman($where,"pendidikan");
      $this->m_admin->delPengalaman($where,"pasangan");
      $this->m_admin->delPengalaman($where,"anak");
      $this->m_admin->delPengalaman($where,"akun");
      $this->m_admin->delPengalaman($where,"pengalaman");

        echo "Berhasil";
    }


  }
