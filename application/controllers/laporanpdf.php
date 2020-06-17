 <?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanpdf extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
	}

	public function printpb($npk)
	{

		$data['pb'] = $this->m_admin->joinTaliasih1($npk)->row();
		$html = $this->load->view('superadmin/printpb',$data,true);
	    
	    $this->load->library('pdf');
	    $this->pdf->loadHtml($html);
	    // $customPaper = array(0,0,570,570);
	    //$this->pdf->set_paper($customPaper);
	    $this->pdf->setPaper('A4','portrait');//landscape
	    $this->pdf->render();
	    $this->pdf->stream("PB".$npk, array('Attachment'=>0));
	    //'Attachment'=>0 for view and 'Attachment'=>1 for download file        
	}


	public function printpkwt($npk)
	{

		$data['pkwt'] = $this->m_admin->getPKWT($npk)->row();
 		$html = $this->load->view('superadmin/printpkwt',$data,true);

		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4','portrait');
		$this->pdf->render();
		$this->pdf->stream("PKWT".$npk, array('Attachment' => 0));
	}
} 