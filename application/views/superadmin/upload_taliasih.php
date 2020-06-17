

 <!-- Begin Page Content -->
<div class="container-fluid">
 <!-- DataTales Example -->

     <form id="posting" onsubmit="return cekform()" method="post" enctype="multipart/form-data" action="<?= base_url('superadmin/Upload_taliasih/') ?>" >
       <div class="form-inline mb-4">
       		<input id="file" onchange="return validasi()" type="file" name="file" class="form-control">
        	<input  name="submit" type="submit" class="btn btn-danger btn-sm ml-3" value="Upload Taliasih"> 
          <a href="<?= base_url('assets/upload/format_pb.xlsx') ?>" class="btn btn-success btn-sm ml-2" ><i class="fa fa-download"></i> Download Format Upload</a>     
    	</div>
  </form>
<?= $this->session->flashdata('error') ?>
  <?php if(isset($_POST['submit'])){ ?>
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Taliasih Anggota</h6>
            </div>
            <div class="card-body">
<div class="table-responsive-sm ml-4 mr-3">
  <form action="<?= base_url('superadmin/Upload_taliasih/posting') ?>" method="post">
     <table id="dataTable"  class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>NPK</th>
            <th>Taliasih</th>
            <th>Terbilang</th>
            <th>Account</th>
            <th>Bank</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($sheet as $row) : ?>
            <tr>
              <td><?= $row['A'] ?></td>
              <td><?= $row['E'] ?></td>
              <td><?= $row['K'] ?></td>
              <td><?= $row['L'] ?></td>
              <td><?= $row['M'] ?></td>
              <td><?= $row['N'] ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
    </table>
  <button type="submit" name="submit" class="btn btn-danger ">Posting Taliasih</button>
</form>
</div>
</div>
 <?php } ?>
 <?php if($this->session->flashdata('sukses')) { ?>
  <script type="text/javascript">
    swal({
            icon : "success",
            title : "Berhasil"
        })
  </script>
 <?php }elseif($this->session->flashdata("error")){ ?>
  <script type="text/javascript">
    swal({
      icon : "error",
      dangerMode : true ,
      text : "format taliasih salah ",
      title : "Error"
    });
    return false;
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