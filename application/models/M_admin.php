<?php


 /**
  *
  */
 class M_admin extends CI_Model
 {

 	public function getData($table)
 	{
 		return $this->db->get($table);
 	}

 	//join data karyawan
 	public function joinAnggota()
 	{
 		$this->db->select('*');
		$this->db->from('employe_karyawan');
		$this->db->order_by('nama');
		$this->db->join('karyawan', 'karyawan.id_karyawan = employe_karyawan.id_karyawan');
		$query = $this->db->get();
		return $query ;
 	}


 	//join table taliasih dan pkwt untuk taliasih anggota
 	//join data karyawan
 	public function joinTaliasih()
 	{
 		$this->db->select('*');
		$this->db->from('taliasih');
		$this->db->join('pkwt', 'pkwt.id_karyawan = taliasih.id_karyawan');
		$query = $this->db->get();
		return $query ;
 	}




 	//ganti password
 	public function updatePassword($where,$data)
 	{
 		$this->db->where($where);
 		return $this->db->update('akun',$data);
 	}

 	//ambil history data pkwt karyawan
 	public function getPKWT($npk)
 	{
 		return $this->db->get_where('pkwt', array('npk_br' => $npk));
 	}


 	//ambil  pkwt untuk di print
 	public function getprintPKWT($npk)
 	{
 		$this->db->where('npk_lm',$npk);
 		$this->db->or_where('npk_br',$npk);
 		return $this->db->get('pkwt');
 	}



 	//upload file pkwt
 	public function uploadfile($filename)
 	{
 		$this->load->library('upload');
 		$config['upload_path']		= './assets/upload/pkwt';
 		$config['allowed_types']	='xlsx';
 		$config['max_size']			='12048';
 		$config['overwrite']		=true ;
 		$config['file_name']		= $filename;

 		$this->upload->initialize($config);
 			if ($this->upload->do_upload('file')) {
 				//jik berhasil
 				$return = array('result' => 'success' , 'file'	=> $this->upload->data() , 'error' => '');
 				return $return;
 			}else{
 				$return = array('result' => 'gagal' , 'file' => '' , 'error' => $this->upload->display_errors());
 				return $return;
 			}
 	}

 	//upload file taliasih
 	public function uploadfile2($filename)
 	{
 		$this->load->library('upload');
 		$config['upload_path']		= './assets/upload/taliasih';
 		$config['allowed_types']	='xlsx';
 		$config['max_size']			='12048';
 		$config['overwrite']		=true ;
 		$config['file_name']		= $filename;

 		$this->upload->initialize($config);
 			if ($this->upload->do_upload('file')) {
 				//jik berhasil
 				$return = array('result' => 'success' , 'file'	=> $this->upload->data() , 'error' => '');
 				return $return;
 			}else{
 				$return = array('result' => 'gagal' , 'file' => '' , 'error' => $this->upload->display_errors());
 				return $return;
 			}
 	}


 	//upload file anggota baru
 	public function uploadfile3($filename)
 	{
 		$this->load->library('upload');
 		$config['upload_path']		= './assets/upload/anggota/';
 		$config['allowed_types']	='xlsx';
 		$config['max_size']			='12048';
 		$config['overwrite']		=true ;
 		$config['file_name']		= $filename;

 		$this->upload->initialize($config);
 			if ($this->upload->do_upload('file')) {
 				//jik berhasil
 				$return = array('result' => 'success' , 'file'	=> $this->upload->data() , 'error' => '');
 				return $return;
 			}else{
 				$return = array('result' => 'gagal' , 'file' => '' , 'error' => $this->upload->display_errors());
 				return $return;
 			}
 	}


 	//tambah file pkwt / taliasih yang di upload ke database
 	public function tambah($table,$data)
	{
		$this->db->insert_batch($table, $data);
	}


	//fungsi hapus data pkwt yang akan di perbarui
	public function delPKWTlama($where)
	{
		$this->db->where('npk_br',$where);
		return $this->db->delete('pkwt');
	}

	//fungsi hapus data pkwt
	public function delPKWTupload($where)
	{
		$this->db->where('id',$where);
		return $this->db->delete('pkwt');
	}

	//input data pkwt lama ke table history pkwt
	public function insertHistoryPKWT($data)
	{
		return $this->db->insert('history_pkwt',$data);
	}


	//fungsi hapus data taliasih lama
	public function delTaliasihupload($where)
	{
		$this->db->where('id',$where);
		return $this->db->delete('taliasih');
	}

	//input data taliasih lama ke table history taliasih
	public function insertHistoryTaliasih($data)
	{
		return $this->db->insert('history_taliasih',$data);
	}


	//join data taliasih dan pkwt untuk di print
 	public function joinTaliasih1($where)
 	{
 		/*$this->db->select('*');
		$this->db->from('taliasih');
		$this->db->where('npk_br',$where);
		$this->db->join('pkwt', 'pkwt.id_karyawan = taliasih.id_karyawan');
		$query = $this->db->get();
		return $query ;*/
		return $this->db->get_where('taliasih',array('id_karyawan' => $where));
 	}

 	//total karyawan yang pkwt per tanggal
 	public function dayPKWT($where)
 	{
 		return $this->db->get_where('pkwt',array('tgl' => $where) );
 	}

 	//update status file pkwt agar bisa di upload
 	public function statPKWT($where,$data)
 	{
 		$this->db->where(array('id_karyawan' => $where) );
 		return $this->db->update("pkwt",$data);
 	}

 	//menampilkan user sesuai role id
 	public function roleUser($where)
 	{
 		$this->db->where($where);
 		return $this->db->get("akun");
 	}

 	//hapus akun arh dan akun user
 	public function hapusAkun($where)
 	{
 		$this->db->where($where);
 		return $this->db->delete("akun");
 	}


 	//tambah akun arh dan anggota baru
 	public function addArhuser($data,$table)
 	{
 		return $this->db->insert($table,$data);
 	}

 	//ambil data kelengkapan berkas npk
 	public function getBerkas($where,$table)
 	{
 		return $this->db->get_where($table, array('npk_br' => $where));
 	}

 	//pagination data
 	public function pageData($table,$limit , $start , $keyword = null)
 	{
 		if($keyword){
 			$this->db->like('npk_br' , $keyword);
 			$this->db->or_like('nama' , $keyword);
 		}
 		return $this->db->get($table,$limit , $start)->result();
 	}


 	//pagination data akun user
 	public function pageUser($table,$limit , $start , $keyword = null)
 	{
 		if($keyword){
 			$this->db->like('npk' , $keyword);
 			$this->db->or_like('email' , $keyword);
 			$this->db->where("role_id" , 3);
 		}
 		$this->db->where("role_id" , 3);
 		return $this->db->get($table,$limit , $start)->result();
 	}




 	//update data kelengkapan berkas untuk backup tabel taliasih
 	public function updatePB($data,$where,$table)
 	{
 		$this->db->where("id", $where);
 		return $this->db->update($table,$data);
 	}

 	//update status tempat instalasi / employee user
 	public function updateInstalasi($data,$where,$table)
 	{
 		$this->db->where($where);
 		return $this->db->update($table,$data);
 	}

 	//ambil data karyawan berdasarkan npk/id_karyawan
 	public function getKar($table ,$where)
 	{
 		return $this->db->get_where($table,$where);
 	}

 	//hapus data pengalaman lama dan skill
 	public function delPengalaman($where,$table)
 	{
 	 	$this->db->where($where);
 	 	return $this->db->delete($table);
 	}

 	//tambah data skill dan pengalaman
 	public function addPengalaman($data,$table)
 	{
 		return $this->db->insert($table,$data);
 	}



 	//menampilkan nama anak berdasarkan nik buat data model
 	public function getNIKAnak($where)
 	{
 		return $this->db->get_where("anak",array('nik' => $where));
 	}

 	public function joinExcel()
 	{
 		$this->db->select('*');
		$this->db->from('employe_karyawan');
		$this->db->join('karyawan', 'karyawan.id_karyawan = employe_karyawan.id_karyawan');
		$this->db->join('pendidikan', 'pendidikan.id_karyawan = employe_karyawan.id_karyawan');
		$query = $this->db->get();
		return $query ;

 	}


 	public function infoDashboard($table,$where)
 	{
 		return $this->db->get_where($table,$where);
 	}

 	public function infoLogin($table,$where)
 	{
 		$this->db->limit(10);
 		return $this->db->get_where($table,$where);
 	}
 }
