<?php


 /**
  * 
  */
 class Berkas extends CI_Controller
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
 		$this->load->view("template/header");
 		$this->load->view("superadmin/Berkas");
 		$this->load->view("template/footer");
 	}


 	public function loadBerkas()
 	{
 		$keyword = $this->input->post("keyword");
 		$where = $keyword ;
 		$berkas = $this->m_admin-> getBerkas($where,"pkwt");
    $item = $this->m_admin-> getBerkas($where,"pkwt")->row();

 				if($berkas->num_rows() == 0){
 					echo "<div class='alert alert-danger'>Data No Found</div>";	
 				}else { ?>
 				<div class="col-md-12 col-lg-12">
         <div id="tracking-pre"></div>
         <div id="tracking">
            <div class="text-center tracking-status-intransit">
               <p class="tracking-status text-tight">tracking history kelengkapan berkas</p>
            </div>
            <div class="tracking-list">
               <div class="tracking-item">
                  <div class="tracking-icon status-intransit">
                     <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                     </svg>
                     <!-- <i class="fas fa-circle"></i> -->
                  </div>
                  <div class="tracking-date">Tanggal PKWT <?= $item->tgl ?></div>
                  <div class="tracking-content"><u class="text-primary"><?= $item->pkwt ?></u> </div>
                  <div class="tracking-content">Ijazah<label class="text-success ml-2 "><?php echo  $item->file_pkwt != ""  ? '<a href="javascript:ijazah()" > <i class="fa fa-check"></i> </a>'  :  'Data belum lengkap' ;?> </label></div>

                  <div class="tracking-content">PKWT Tertanda Tangan<label class="text-success ml-2 "><?php echo  $item->file_pkwt != ""  ? '<a href="javascript:file()" > <i class="fa fa-check"></i> </a>'  :  'Data belum lengkap' ;?> </label></div>
               </div>
                  <hr>
              <script type="text/javascript">
                  function file(){
                   window.open("<?= base_url("assets/upload/backup_pkwt/". $item->file_pkwt) ?>","height=650","width=650","menubar=yes","resizable=yes");
                  }

                  function ijazah(){
                   window.open("<?= base_url("assets/upload/backup_pkwt/". $item->ijazah) ?>","height=650","width=650","menubar=yes","resizable=yes");
                  }

      			  </script>
        </div>

 	<?php }
 	}
 }