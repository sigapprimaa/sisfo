 <!-- Begin Page Content -->
<div class="container-fluid">
 <!-- DataTales Example -->

     <form id="posting" onsubmit="return cekform()" method="post" enctype="multipart/form-data" action="<?= base_url('superadmin/Upload_anggota') ?>" >
       <div class="form-inline mb-4">
        <div class="form-control">
       		<input id="file" onchange="return validasi()" type="file" name="file" >
        </div>
        	<input  name="submit" type="submit" class="btn btn-danger btn-sm ml-3" value="Upload Anggota">  
          <a href="<?= base_url('assets/upload/format_anggota.xlsx') ?>" class="btn btn-success btn-sm ml-2" ><i class="fa fa-download"></i> Download Format Upload</a>    
    	</div>
  </form>
  <?php if($this->session->flashdata("error")){
    echo $this->session->flashdata("error");
  } ?>

  <?php if(isset($_POST['submit'])){ ?>
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Anggota </h6>
            </div>
            <div class="card-body">
<div class="table-responsive-sm ml-4 mr-3">
  <?php

    function kode($panjang){
      $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabacdefghijklmnopqrstuvwxyz1234567890' ;
      $string = '' ;
      for($i = 0 ; $i < $panjang ; $i++){
        $pos = rand(0,strlen($karakter)-1) ;
        $string .= $karakter{$pos};

      }
      return $string;
    }

    $kode_post = kode(6);
   ?>
  <form action="<?= base_url('superadmin/Upload_anggota/posting') ?>" method="post">
  <input type="hidden" id="kode_upload" name="kode_upload" value="<?=  $kode_post ?>">
     <table id="dataTable"  class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NPK</th>
            <th>Agama</th>
            <th>ARH</th>
            <th>Join Date</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1 ; foreach($sheet as $row) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $row['B'] ?></td>
              <td><?= $row['C'] ?></td>
              <td><?= $row['D'] ?></td>
              <td><?= $row['I'] ?></td>
              <td><?= $row['H'] ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
    </table>
  <button type="submit" name="submit" class="btn btn-danger ">Posting Anggota</button>
</form>
</div>
</div>
 <?php } ?>
 <?php if($this->session->flashdata('sukses')) { ?>
  <script type="text/javascript">
    swal({
            icon : "success",
            title : "Berhasil"
        }).then(function(){
          window.location.href="<?= base_url('superadmin/Printpkwt/get/') ?>"+ document.getElementById('kode_upload').value;
        })
  </script>
 <?php } ?>
 <script type="text/javascript">

  function cekform(){
    var file = document.getElementById('file').value ;
      if(file == ""){
          swal({
            icon : "warning",
            title : "Perhatian",
            text : "file upload kosong",
            dangerMode : [true,"Ok"]
          })
          return false ;
      }

  }

  function validasi(){
    var file = document.getElementById('file');
    var path = file.value ;
    var exe = /(\.xlsx)$/i ;
      if(!exe.exec(path)){
         swal({
            icon : "error",
            title : "Perhatian",
            text : "file tidak di ijinkan di upload ",
            dangerMode : [true,"Ok"]
          })
        file.value = "" ;
        return false ;
      }
  }
</script>