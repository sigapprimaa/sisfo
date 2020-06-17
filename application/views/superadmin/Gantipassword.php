 <!-- Begin Page Content -->
<div class="container-fluid"   style="margin-bottom: 360px" >
 <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
    </div>
    <div class="card-body">
  <div class="table-responsive-sm ml-4 mr-3">

    <form id="form" action="" method="post" >
      <div class="form-group">
        <label>New Password</label>
        <input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
        <input type="password" autocomplete="off" name="pass" id="pass" class="form-control" placeholder="Enter New Password">
      </div>
      <div class="form-group">
        <label>Re-type Password</label>
        <input type="password" name="pass2" autocomplete="off" id="pass2" class="form-control" placeholder="Enter Re-type Password">
      </div>

      <div class="form-group" >
        <button type="submit" class="btn btn-danger"><i class="fa fa-lock"></i> Update Password</button>
      </div>
      <div id="loading"></div>
    </form>
    </div>
  </div>
</div>

</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#form").on('submit',function(event){
      event.preventDefault();
        
        if(document.getElementById('pass').value == ""){
          swal({
            icon : "error",
            title : "Perhatian",
            text : "password baru masih kosong",
            dangerMode : [true , "Ok"]
          })
        }else if(document.getElementById("pass2").value == "" ){
          swal({
            icon : "error",
            title : "Perhatian",
            text : "re-type  password baru masih kosong",
            dangerMode : [true , "Ok"]
          })
        }else if (document.getElementById("pass").value != document.getElementById("pass2").value ){
          swal({
            icon : "error",
            title : "Perhatian",
            text : "password tidak sama",
            dangerMode : [true , "Ok"]
          })
        }else {

            $.ajax({
              url : "<?= base_url('superadmin/Gantipassword/update') ?>",
              method : "POST",
              data : $(this).serialize(),
              beforeSend : function(){
                $("#loading").html("Loading");
              },
              complete : function(){
                $("#loading").html("");
              },
              success : function(msg){
                swal({
                    icon : "success",
                    title : "Berhasil",
                    text : "password update",
                }).then(function(){
                  window.location.href="<?= base_url('superadmin/Gantipassword') ?>"
                })

              }
            })

        }
        return ;

    })
  })
</script>