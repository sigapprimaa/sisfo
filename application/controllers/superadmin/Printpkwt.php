<?php

 /**
  * 
  */
 class Printpkwt extends CI_Controller
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

 	
 	public function get($npk)
 	{
 		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
 		$dompdf = new Dompdf();
 		

 		//$data['result'] = $this->db->get_where('pkwt',array('kode_post' => 'LNlx9F'))->result();
 		
 		$data['pkwt'] = $this->m_admin->getPKWT($npk)->row();
 		$html = $this->load->view('superadmin/printpkwt',$data,true);

 		$dompdf->load_html($html);
 		$dompdf->set_paper('A4','portrait');
 		$dompdf->render();
 		$pdf = $dompdf->output();
 		$filename = "PKWT " . $data['pkwt']->nama . $npk ;
 		$dompdf->stream( $filename .'.pdf' ,array('Attachment' => 0 ) );

 	}
 }