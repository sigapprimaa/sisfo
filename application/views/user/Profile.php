 <!-- Begin Page Content -->
<div class="container-fluid" >
 <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Ganti Profile Picture</h6>
    </div>
    <div class="card-body">
  <div class="table-responsive-sm ml-4 mr-3">

    <form id="form2" action="#" enctype="multipart/form-data" method="post" >
      <div class="form-group">
          <img height="450" width="450" class="img-thumbnail" src="<?= base_url('assets/upload/berkas/poto/'. $img->photo) ?>">
        </div>
        <div class="form-control">
        <input type="hidden" name="npk" value="<?= $this->session->userdata('id_karyawan') ?>">
        <input type="file" onchange="return validasi()" name="photo" id="file">
      </div>
      <span class="small text-danger">hanya gif jpeg jpg dan jpeg yang di ijinkan di upload</span><br>
      <input type="submit" name="upload" id="submit" value="Update" class="btn btn-primary btn-sm mt-2">
    </form>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  function validasi(){
    var file = document.getElementById('file');
    var path = file.value ;
    var exe = /(\.jpg|\.png|\.jpeg|\.gif)$/i;
      if(!exe.exec(path)){
        swal({
          icon : "error",
          title : "File Salah",
          dangerMode : [true,"Ok"]
        });
        file.value = "" ;
        return false 
      }
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $("#form2").on('submit',function(event){
        event.preventDefault();
        if(document.getElementById('file').value == ""){
            swal({
              icon : "error",
              title : "File kosong ",
              dangerMode : [true,"Ok"]
            })
        }else {
            $.ajax({
              url : "<?= base_url('user/Profile/update') ?>",
              method : "POST",
              data : new FormData(this),
              processData : false ,
              contentType : false ,
              cache : false ,
              success : function(msg){
                  swal({
                    icon : "success",
                    title : "Berhasil"
                  }).then(function(){
                    window.location.href="<?= base_url("user/Profile/") ?>";
                  })
              }
            })
        }
            
      })
  })
</script>
