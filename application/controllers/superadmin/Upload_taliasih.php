<?php


 /**
  *
  */
 class Upload_taliasih extends CI_Controller
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

 	private $filename = "upload_taliasih";
 	public function index()
 	{

 		$data = array();
		if(isset($_POST['submit'])){
			$upload = $this->m_admin->uploadfile2($this->filename);
			if($upload['result'] =="success") {
                    // Load plugin PHPExcel nya
                    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

                    $excelreader = new PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('assets/upload/taliasih/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
                    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

                    // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                    // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                    $data['sheet'] = $sheet ;
                }else{
                    $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
                    echo $upload['error'];
                }

		}


 		$this->load->view('template/header');
 		$this->load->view('superadmin/upload_taliasih',$data);
 		$this->load->view('template/footer');

 	}


 	public function posting()
 	{
 		date_default_timezone_set('Asia/Jakarta');
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('assets/upload/taliasih/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder taliasih
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();

        $numrow = 1;



        	foreach($sheet as $row){


                    if($numrow > 1){

                        $ceknpk = $this->db->get_where("karyawan", array('npk'  => $row['E'])) ;
                            if($ceknpk->num_rows() == 0){
                                $this->session->set_flashdata("error","<div class='alert alert-danger'>NPK ". $row['E'] ." tidak terdaftar di master karyawan!</div>");
                                redirect("superadmin/Upload_taliasih");
                            }

                        //push data tabel tali_asih
                        array_push($data, array(
                            'id_karyawan'       => $row['E'],
                            'no'                => $row['A'],
                            'npk'               => $row['E'],
                            'alamat'            => $row['F'],
                            'nama'              => $row['B'],
                            'tempat_tugas'      => $row['C'],
                            'cabang'            => $row['D'],
                            'kelurahan'         => $row['G'],
                            'kecamatan'         => $row['H'],
                            'kota'              => $row['I'],
                            'no_ktp'            => $row['J'],
                            'tali_asih'         => $row['K'],
                            'terbilang_3'       => $row['L'],
                            'account'           => $row['M'],
                            'bank'              => $row['N'],
                            'pihak_pertama'     => $row['O'],
                            'status_pp'         => $row['P'],
                            'tanggal'           => $row['Q'],
                            'tgl_terbilang'     => $row['R'],
                            'no_surat'          => $row['S'],
                            'surat_kuasa'       => $row['T'],
                            'tgl_kuasa'         => $row['U'],
                            'tbl_kuasa'         => $row['V'],
                            'tgl_dibayar'       => $row['W'],
                            'tgl_berakhir'      => $row['X'],
                        ));
                    }

                        $numrow++; // Tambah 1 setiap kali looping
        	}
        	$this->m_admin->tambah('taliasih',$data);
        	$this->session->set_flashdata('sukses',"save");
        	redirect('superadmin/Upload_taliasih');

 	}




 }
