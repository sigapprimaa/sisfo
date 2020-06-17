<?php
if($this->session->userdata('role_id') == 3 ){
  $data = $this->db->get_where('karyawan',array('id_karyawan' => $this->session->userdata('id_karyawan')))->row();
}else if($this->session->userdata('role_id') == 1 ){
  $data = $this->db->get_where('karyawan',array('id_karyawan' => $this->session->userdata('id_karyawan')))->row();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SISFO | SIGAP PRIMA ASTREA</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <!-- Custom styles for this template-->

  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/') ?>img/sigap.icon">

  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/sigap.icon">
   <!-- Custom styles for this page -->
  <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->

  <!-- datepicker css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/datepicker/') ?>bootstrap-datepicker3.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/datepicker/') ?>bootstrap-iso.css">
  <script src="<?= base_url('assets/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/datepicker/') ?>bootstrap-datepicker.min.js"></script>
</head>

<body id="page-top" onload="waktu()">
<script>
      windows.setTimeout("waktu()",10000);
      function waktu(){
        var tanggal = new Date();
        setTimeout("waktu()",1000);
        document.getElementById('output').innerHTML  = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
      }
    </script>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-divider my-0">SISFO<br>Master Data</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

 <?php if($this->session->userdata('role_id') == 1) { ?>
 <!-- menu untuk super admin  -->
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('superadmin/') ?>dashboard">
           <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider my-0">

       <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-print ml-1"></i>
          <span>Print</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sub menu:</h6>
            <a class="collapse-item" href="<?php echo base_url('superadmin/Pkwt') ?>">Cetak PKWT</a>
            <a class="collapse-item" href="<?php echo base_url('superadmin/Taliasih') ?>">Cetak Taliasih</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider my-0">
  <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-upload"></i>
          <span>Upload</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Upload Excel:</h6>
            <a class="collapse-item" href="<?= base_url('superadmin/') ?>Upload_PKWT">PKWT</a>
            <a class="collapse-item" href="<?= base_url('superadmin/') ?>Upload_taliasih">Taliasih</a>
            <a class="collapse-item" href="<?= base_url('superadmin/') ?>Upload_anggota">Anggota</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-history"></i>
          <span>History</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="<?= base_url('superadmin/history/pkwt') ?>">PKWT</a>
            <a class="collapse-item" href="<?= base_url('superadmin/history/taliasih') ?>">Taliasih</a>
            <a class="collapse-item" href="<?= base_url('superadmin/history/pmdk') ?>">PMDK</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <li class="nav-item open `  1">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-users"></i>
          <span>Anggota</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="<?= base_url('superadmin/Daftar_anggota') ?>">Data Anggota</a>
          </div>
        </div>
      </li>

    <hr class="sidebar-divider my-0">
  <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Pengguna</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Upload Excel:</h6>
            <a class="collapse-item" href="<?= base_url('superadmin/') ?>Akun/user">User</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('superadmin/') ?>Backup_sisfo">
           <i class="fas fa-fw fa-database"></i>
          <span>Backup SQL</span></a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
<!--       <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('superadmin/pkwt')?>">
        <i class="fas fa-fw fa-print"></i>
        <span>PKWT Anggota</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('superadmin/') ?>taliasih">
        <i class="fas fa-fw fa-print"></i>
          <span>Tali Asih Anggota</span></a>
      </li> -->

<!-- end of menu super admin -->



 <?php }else if($this->session->userdata('role_id') == 3) { ?>
<!-- Menu untuk user -->
      <!-- Nav Item - Dashboard -->

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('user/Dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('user/Biodata') ?>">
          <i class="far fa-address-card"></i>
          <span>Biodata</span></a>
      </li>
      <hr class="sidebar-divider">

       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('user/UploadBerkas') ?>">
          <i class="fas fa-fw fa-image"></i>
          <span>Upload Berkas</span></a>
      </li>

      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('user/Dokumen') ?>">
          <i class="fas fa-file-alt"></i>
          <span>Dokumen</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('user/Tracking') ?>">
          <i class="far fa-file-pdf"></i>
          <span>PKWT & Tali Asih</span></a>
      </li>
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('user/Profile') ?>">
          <i class="far fa-user"></i>
          <span>Ganti Poto</span></a>
      </li>
      <hr class="sidebar-divider">
      <!-- end of menu user -->
 <?php } ?>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php if($this->session->userdata("role_id") == 1) {
                    $data = $this->db->get_where('karyawan',array('id_karyawan' => $this->session->userdata('id_karyawan')))->row();
                        echo $data->nama;
                     }elseif($this->session->userdata("role_id") == 3) {
                        $data = $this->db->get_where('karyawan',array('id_karyawan' => $this->session->userdata('id_karyawan')))->row();
                          echo $data->nama;
                      }
                  ?>

                  </span>
                <?php if($this->session->userdata('role_id') == 3){
                $photo = $this->db->get_where('employe_karyawan',array('id_karyawan' => $this->session->userdata('id_karyawan')))->row(); ?>
                  <img class="img-profile rounded-circle" src="<?= base_url("assets/upload/berkas/Poto/".$photo->photo) ?>">
                <?php } else { ?>
                  <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/user.png">
                <?php } ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               <?php if($this->session->userdata('role_id') == 1) { ?>
                <a class="dropdown-item" href="<?= base_url('superadmin/Gantipassword') ?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                 <?php } else if($this->session->userdata('role_id') == 3) { ?>
                  <a class="dropdown-item" href="<?= base_url('user/Gantipass') ?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
