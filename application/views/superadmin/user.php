 <!-- Begin Page Content -->
<div class="container-fluid">
 <!-- DataTales Example -->
 <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mb-2">Tambah User <i class="fa fa-user-plus"></i> </button>
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Akun User</h6>
            </div>
            <div class="card-body">
<div class="table-responsive-sm ml-4 mr-3">
  <div class="form-inline">
       <form action="<?= base_url('superadmin/Akun/user') ?>" method="post">
          <input type="text" name="keyword" class="form-control " placeholder="Search ">
          <input type="submit" name="submit" class="btn btn-primary" value="Cari">
      </form>
 <?php
  if(isset($_POST['submit'])){ ?>
    <a href="<?= base_url('superadmin/Akun/user') ?>" class="btn btn-danger ml-2">Reset Pencarian</a>
<?php  }
 ?>
    </div>
 <b class="mb-2"><i><?= $result . ' Akun Anggota' ?></i></b>
  <table id="dataTable2"  class="table table-bordered">
    <thead class="thead-success">
    <tr class="table-success">
      <th scope="col">No</th>
      <th scope="col">NPK</th>
      <th scope="col">Email</th>
      <th scope="col">Status Akun</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="show-user">
        <?php  foreach($akun as $item) : ?>
      <tr>
        <td><?= ++$no ?></td>
        <td><?= $item->npk ?></td>
        <td><?= $item->email ?></td>
        <td align="center"><label class="badge badge-success text-center"><?php echo $item->role_id == 3 ?  "Anggota" : "User" ; ?></label></td>
        <td>
          <button type="button" title="edit data" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#exampleModal<?= $item->id ?>"><i class="fa fa-book"></i> </button>
          <a class="btn btn-danger btn-circle btn-sm" href ="javascript:del(<?= $item->id ?>)"><i class="fa fa-trash  "></i> </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  </table>
  <?= $pagination ?>
</div>
</div>
</div>
</div>



<!-- modal tambah akun baru -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="load" style="position: absolute;z-index: 9;display: flex;margin : 150px 80px;">
      <img id="loading" style="display: none;" src="<?= base_url('assets/img/load.gif') ?>" >
    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Tambah Akun <i class="fa fa-user-plus"></i> </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form">
      <div class="modal-body">
         <div class="form-group">
            <label>NPK</label>
            <input type="text" id="npk" autocomplete="off" class="form-control" name="npk" >
         </div>
         <div class="form-group">
            <label>Email</label>
            <input type="email" id="email" autocomplete="off" class="form-control" name="email" >
         </div>

         <div class="form-group">
            <label>Password</label>
            <input type="password" id="password" class="form-control" name="pass" >
         </div>

         <div class="form-group">
            <label>Re-Password</label>
            <input type="password" id="password2" class="form-control" name="pass" >
         </div>

      </div>
      <div class="modal-footer">
        <button id="button" disabled="" type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>


<!-- modal update akun -->
<?php foreach($akun as $row) : ?>
  <!-- modal tambah akun baru -->
<div class="modal fade" id="exampleModal<?= $row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="load" style="position: absolute;z-index: 9;display: flex;margin : 150px 80px;">
      <img id="loading" style="display: none;" src="<?= base_url('assets/img/load.gif') ?>" >
    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Edit Akun <i class="fa fa-user-plus"></i> </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form<?= $row->id ?>">
      <div class="modal-body">
         <div class="form-group">
            <label>NPK</label>
            <input type="hidden" name="id" value="<?= $row->id ?>">
            <input type="text" id="npk2" value="<?= $row->npk ?>" readonly="" class="form-control" name="npk" >
         </div>
         <div class="form-group">
            <label>Email</label>
            <input type="email" id="email" value="<?= $row->email ?>" class="form-control" name="email" >
         </div>

         <div class="form-group">
            <label>Password</label>
            <input type="password" placeholder="***" id="password" class="form-control" name="pass" >
         </div>
      </div>
      <div class="modal-footer">
        <button id="button" type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
      </div>
    </div>
  </div>
<script>
  $(document).ready(function(){
    $("#form<?= $row->id ?>").on('submit',function(event){

        event.preventDefault();
       var npk = document.getElementById('npk2').value ;
          if(npk == ""){
            swal({
              icon : "error",
              title : "Gagal",
              text : "npk harus di isi",
              dangerMode : [true , "Ok"]
            });
            return false;
          }else {

              $.ajax({
                url : "<?= base_url("superadmin/Akun/updateUser") ?>",
                method : "POST",
                data : $(this).serialize(),
                beforeSend : function(){
                  $("#loading").show();
                },
                complete : function(){
                  $("#loading").hide();
                },
                success : function(response){
                  swal({
                    icon : "success",
                    title : response,
                  }).then(function(){
                    window.location.href="<?= base_url('superadmin/Akun/user') ?>"
                  });
                }
              })
          }


    })
  })
</script>
  <?php endforeach ?>

<script>
  $(document).ready(function(){
    $("input").click(function(){
      $("#button").attr("disabled",false);
    })


    $("#form").on('submit',function(event){

        event.preventDefault();
       var npk = document.getElementById('npk').value ;
       var pass = document.getElementById('password').value ;
       var pass2 = document.getElementById('password2').value ;
       var email = document.getElementById('email').value ;
          if(npk == ""){
            swal({
              icon : "error",
              title : "Gagal",
              text : "npk harus di isi",
              dangerMode : [true , "Ok"]
            });
            return false;
          }else if(email == ""){
            swal({
              icon : "error",
              title : "Gagal",
              text : "email harus di isi",
              dangerMode : [true , "Ok"]
            });
            return false;
          }else if(pass == ""){
            swal({
              icon : "error",
              title : "Gagal",
              text : "pass harus di isi",
              dangerMode : [true , "Ok"]
            });
            return false;
          }else if(pass != pass2){
            swal({
              icon : "error",
              title : "Gagal",
              text : "password tidak sama",
              dangerMode : [true , "Ok"]
            });
            return false;
          }else {

              $.ajax({
                url : "<?= base_url("superadmin/Akun/addUser") ?>",
                method : "POST",
                data : $(this).serialize(),
                beforeSend : function(){
                  $("#loading").show();
                },
                complete : function(){
                  $("#loading").hide();
                },
                success : function(response){
                  if(response == "Gagal"){
                      swal({
                        icon : "error",
                        title : "Gagal",
                        text : "NPK tidak ada di master karyawan",
                        dangerMode : [true,"Ok"]
                      })                    
                  }else if (response == "ada") {
                      swal({
                        icon : "error",
                        title : "akun sudah ada ",
                        dangerMode : [true,"Ok"]
                      })
                  }else {
                      swal({
                        icon : "success",
                        title : "Berhasil menambah data",
                      }).then(function(){
                        window.location.href="<?= base_url('superadmin/Akun/user') ?>"
                      });
                  }

                }
              })

          }


    })
  })
</script>




<!-- hapus data lewat ajax jquery -->
<script type="text/javascript">
  function del(id){
    swal({
      title: "Yakin Hapus Data?",
      text: "data yang di hapus tidak bisa di kembalikan",
      icon: "warning",
      buttons: [true,"Tetap Hapus"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
            url : "<?= base_url('superadmin/Akun/deleteUser') ?>",
            method : "POST",
            data : "id="+id ,
            success : function(response){
              swal({
                icon : "success",
                title : "Terhapus",
              }).then(function(){
                window.location.href="<?= base_url('superadmin/Akun/user') ?>"
              });

              return false ;
            }

          })
      }
    });
  }
</script>
