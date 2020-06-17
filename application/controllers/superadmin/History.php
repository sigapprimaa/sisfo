<?php


 /**
  *
  */
 class History extends CI_Controller
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

 	public function pkwt()
 	{

 		/*$this->load->library('pagination');

	    if($this->input->post('submit')){
	      $data['keyword']  = $this->input->post('keyword');
	      $this->session->set_userdata('keyword',$data['keyword']);
	    }else {
	      $data['keyword'] = $this->session->userdata('keyword') ;
	    }

	   $this->db->like('npk_br',$data['keyword']);
	   $this->db->or_like('nama' , $data['keyword']);
	   $this->db->from('history_pkwt');
	   	$config['base_url']  =  'http://localhost/sisfo_data/superadmin/history/pkwt/index/' ;
	    $config['total_rows'] = $this->db->count_all_results();
	    $config['per_page']  = 10 ;

	    //initialize
	    $this->pagination->initialize($config);
	    $data['pagination'] = $this->pagination->create_links();

	    $data['result'] = $config['total_rows'];
	    $data['start'] = $this->uri->segment(5) ;
	    $data['no'] = $data['start'];
	    $data['item'] = $this->m_admin->pageData('history_pkwt',$config['per_page'],$data['start'],$data['keyword']);
 		*/
 		$data['item'] = $this->m_admin->getData('history_pkwt')->result();
 		$this->load->view('template/header');
 		$this->load->view('superadmin/history_pkwt',$data);
 		$this->load->view('template/footer');
 	}



 	// history data taliasih user
 	public function taliasih()
 	{
 		$data['item'] = $this->m_admin->getData('history_taliasih')->result();
// 		$data['result'] = $this->m_admin->getData("history_taliasih")->num_rows();
 		$this->load->view('template/header');
 		$this->load->view('superadmin/history_pb',$data);
 		$this->load->view('template/footer');
 	}

  // history data PMDK user
  public function pmdk()
  {
    $data['item'] = $this->m_admin->getData('history_pmdk')->result();
    $this->load->view('template/header');
    $this->load->view('template/history_pmdk',$data);
    $this->load->view('template/footer');
  }

  public function getPMDK()
  {
    $data = $this->m_admin->getData('histroy_pmdk')->result();
    echo json_encode($data);
  }

 	public function getPB()
 	{
 		$data = $this->m_admin->getData('history_taliasih')->result();
 		echo json_encode($data);
 	}

 	public function getPKWT()
 	{
 		$data = $this->m_admin->getData('history_pkwt')->result();
 		echo json_encode($data);
 	}

 }
