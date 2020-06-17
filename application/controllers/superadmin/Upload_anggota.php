<?php

 /**
  * 
  */
 class Upload_anggota extends CI_Controller
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

 	
 	private $filename = "Upload_anggota";
 	public function index()
 	{
 		$data = array();
		if(isset($_POST['submit'])){
			$upload = $this->m_admin->uploadfile3($this->filename);
			if($upload['result'] =="success") {
                    // Load plugin PHPExcel nya
                    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
                    
                    $excelreader = new PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('assets/upload/anggota/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
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
		$this->load->view('superadmin/upload_anggota',$data);
		$this->load->view('template/footer');
 	}



 	public function posting()
 	{

 		date_default_timezone_set('Asia/Jakarta');
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('assets/upload/anggota/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
       
        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();
        $data2 = array() ;
        $data3 = array() ;	
        $data4 = array() ;	
        $data5 = array() ;	
        $data6 = array() ;	
        $data7 = array() ;	
        $data8 = array() ;	
        $numrow = 1;

        	foreach($sheet as $row){
	            if($numrow > 1){
	 			//cek npk sudah terdaftar apa belum di master karyawan
				$cekNPK = $this->db->get_where("karyawan" , array('npk' => $row['C'] , 'id_karyawan' => $row['C']))->num_rows();

	            	if($cekNPK > 0){
	            		$this->session->set_flashdata("error","<div class='alert alert-danger'>NPK ". $row['C'] ." sudah ada di master karyawan!</div>");
		        		redirect("superadmin/Upload_anggota");
					}else {
							// push data anggota baru ke tabel karyawan 
			                array_push($data, array(
			                	'id_karyawan'		=> $row['C'],
			                	'npk'				=> $row['C'],
			                	'nama'				=> $row['B'],
			                	'agama'				=> $row['D'],
			                	'tinggi'			=> $row['E'],
			                	'berat'				=> $row['F'],
			                	'no_telp'			=> $row['G'],
			                	'join_date'			=> $row['H'],
			                	'arh'				=> $row['I']
			                ));

			                // push data karyawn baru ke tabel akun
			                array_push($data2, array(
			                	'id_karyawan'		=> $row['C'],
			                	'npk'				=> $row['C'],
			                	'pass'				=> md5(123) ,
			                	'role_id'			=> 3 
			                ));

			                // push data informasi karyawn  ke tabel employe_karyawan
			                array_push($data3, array(
			                	'id_karyawan'		=> $row['C'],
			                	'npk'				=> $row['C'],
			                	'arh1'				=> $row['I']
			                ));

			                // push data pendidikan ke tabel pendidikan
			                array_push($data4, array(
			                	'id_karyawan'		=> $row['C'],
			                	'npk'				=> $row['C'],
			                ));

			                // push data pengalaman ke tabel pengalaman
			                array_push($data5, array(
			                	'id_karyawan'		=> $row['C'],
			                	'npk'				=> $row['C'],
			                ));

			                // push data keahlian / skill  ke tabel skill
			                array_push($data6, array(
			                	'id_karyawan'		=> $row['C'],
			                	'npk'				=> $row['C'],
			                ));

			                // push data pasangan ke tabel pasangan
			                array_push($data7, array(
			                	'id_karyawan'		=> $row['C'],
			                	'npk'				=> $row['C'],
			                ));

			                // push data ke tabel anak
			             /*   array_push($data8, array(
			                	'id_karyawan'		=> $row['C'],
			                	'npk'				=> $row['C'],
			                ));
*/

					}	                
	            }            
            		$numrow++; // Tambah 1 
        	}

        	//tambah data pkwt karyawan 
        	$this->m_admin->tambah('karyawan',$data);
        	//tambah user akun 
        	$this->m_admin->tambah('akun',$data2);
        	//tambah status info karyawan  
        	$this->m_admin->tambah('employe_karyawan',$data3); 
        	//tambah status pendidkan karyawan  
        	$this->m_admin->tambah('pendidikan',$data4);
        	//tambah status pengalaman karyawan  
        	$this->m_admin->tambah('pengalaman',$data5);
        	//tambah status keahlian karyawan  
        	$this->m_admin->tambah('skill',$data6);
        	//tambah pasangan user  
        	$this->m_admin->tambah('pasangan',$data7);
        	//tambah pasangan anak  
        //	$this->m_admin->tambah('anak',$data8);  
        	$this->session->set_flashdata('sukses',"save");
        	redirect('superadmin/Upload_anggota');

 	}
 }