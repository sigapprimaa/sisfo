<?php


/**
 *
 */
class Upload_PKWT extends CI_Controller
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


	private $filename = "upload_pkwt";

	public function index()
	{
		$data = array();
		if(isset($_POST['submit'])){
			$upload = $this->m_admin->uploadfile($this->filename);
			if($upload['result'] =="success") {
                    // Load plugin PHPExcel nya
                    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

                    $excelreader = new PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('assets/upload/pkwt/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
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
		$this->load->view('superadmin/upload_pkwt',$data);
		$this->load->view('template/footer');

	}


	public function posting()
	{
		date_default_timezone_set('Asia/Jakarta');
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('assets/upload/pkwt/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();

        $numrow = 1;

        //ambil data pkwt karyawan untuk cek sudah pkwt apa belum
        $cekpkwt = $this->m_admin->getData('pkwt')->result();


        foreach($sheet as $p){

        	foreach($cekpkwt as $q){
		        if($p['M'] == $q->npk_br && empty($q->file_pkwt)){
		        	$this->session->set_flashdata("error","<div class='alert alert-danger'>PKWT NPK " . $q->npk_br . " belum di backup , harap backup dulu pkwt npk lama tersebut agar bisa di PKWT ulang !</div>");
		        	redirect("superadmin/Upload_PKWT");
		        }
        	}

        }



        	foreach($sheet as $row){



	            if($numrow > 1){
	            	$ceknpk = $this->db->get_where("karyawan", array('npk'  => $row['M'])) ;
	            	if($ceknpk->num_rows() == 0){
	            		$this->session->set_flashdata("error","<div class='alert alert-danger'>NPK ". $row['M'] ." tidak terdaftar di master karyawan!</div>");
		        		redirect("superadmin/Upload_PKWT");
	            	}


	            	foreach($cekpkwt as $item){
	            		if($item->npk_br == $row['M']){

	            			//ambil data pkwt lama untuk di input ke table history pkwt
	            			$pkwt_lama = $this->m_admin->getPKWT($row['M'])->result();
	            			foreach($pkwt_lama as $item_lama){
	            				$data2 = array(
	            					'id_karyawan'		=> $item_lama->npk_br,
	            					'no'				=> $item_lama->no,
				                   	'pkwt'				=> $item_lama->pkwt,
				                   	'hari'				=> $item_lama->hari,
				                   	'tgl'				=> $item_lama->tgl,
				                   	'terbilang'			=> $item_lama->terbilang,
				                   	'nama'				=> $item_lama->nama,
				                   	'alamat'			=> $item_lama->alamat,
				                   	'kelurahan'			=> $item_lama->kelurahan,
				                   	'kecamatan'			=> $item_lama->kecamatan,
				                   	'kota'				=> $item_lama->kota,
				                   	'no_ktp'			=> $item_lama->no_ktp,
				                   	'npk_lm'			=> $item_lama->npk_lm,
				                   	'npk_br'			=> $item_lama->npk_br,
				                   	'tempat_tugas'		=> $item_lama->tempat_tugas,
				                   	'cabang'			=> $item_lama->cabang,
				                   	'start'				=> $item_lama->start,
				                   	'terbilang_1'		=> $item_lama->terbilang_1,
				                   	'end_date'			=> $item_lama->end_date,
				                   	'terbilang_2'		=> $item_lama->terbilang_2,
				                   	'gp'				=> $item_lama->gp,
				                   	'terbilang_3'		=> $item_lama->terbilang_3,
				                   	'bank'				=> $item_lama->bank,
				                   	'rekening'			=> $item_lama->rekening,
				                   	'kode_post'			=> $item_lama->kode_post,
				                   	'file_pkwt'			=> $item_lama->file_pkwt ,
				                   	'pihak_pertama'		=> $item_lama->pihak_pertama ,
				                   	'status_pp'			=> $item_lama->status_pp ,
				                   	'arh'				=> $item_lama->arh ,
	            				);
	            				$this->m_admin->insertHistoryPKWT($data2);
	            			}
	            			$this->m_admin->delPKWTlama($row['M']);
	            		}
	            	}

	                // push data pkwt ke tabel pkwt anggota
	                array_push($data, array(
	                	'id_karyawan'		=> $row['M'],
	                   	'no'				=> $row['A'],
	                   	'pkwt'				=> $row['B'],
	                   	'hari'				=> $row['C'],
	                   	'tgl'				=> $row['D'],
	                   	'terbilang'			=> $row['E'],
	                   	'nama'				=> $row['F'],
	                   	'alamat'			=> $row['G'],
	                   	'kelurahan'			=> $row['H'],
	                   	'kecamatan'			=> $row['I'],
	                   	'kota'				=> $row['J'],
	                   	'no_ktp'			=> $row['K'],
	                   	'npk_lm'			=> $row['L'],
	                   	'npk_br'			=> $row['M'],
	                   	'tempat_tugas'		=> $row['N'],
	                   	'cabang'			=> $row['O'],
	                   	'start'				=> $row['P'],
	                   	'terbilang_1'		=> $row['Q'],
	                   	'end_date'			=> $row['R'],
	                   	'terbilang_2'		=> $row['S'],
	                   	'gp'				=> $row['T'],
	                   	'terbilang_3'		=> $row['U'],
	                   	'bank'				=> $row['V'],
	                   	'rekening'			=> $row['W'],
	                   	'pihak_pertama'		=> $row['X'],
	                   	'status_pp'			=> $row['Y'],
	                   	'kode_post'			=> $this->input->post('kode_upload')
	                ));
	            }
            		$numrow++; // Tambah 1
        	}

        	//tambah data pkwt karyawan
        	$this->m_admin->tambah('pkwt',$data);
        	$this->session->set_flashdata('sukses',"save");
        	redirect('superadmin/Upload_PKWT');
 	}
}
