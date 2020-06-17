 <!-- Begin Page Content -->
<div class="container-fluid">
 <!-- DataTales Example -->
<!-- Ga semua SG dapet tali asih dari user -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tali Asih</h6>
            </div>
            <div class="card-body">
<div class="table-responsive-sm ml-4 mr-3">
  <table id="dataTable" class="table table-bordered">

  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NPK</th>
      <th scope="col">Nama</th>
      <th scope="col">Instalasi</th>
      <!-- tanggal Taliasih tanggal cetak pkwt -->
      <th scope="col">Taliasih</th>
      <!-- Tanggal Berakhir Tali asih -->
      <th scope="col">Terbilang</th>
      <th scope="col">Status</th>
    </tr>
  </thead>

    <tbody>

    <?php $no = 1 ; foreach($result as $row) : ?>

  <tr>
    <td><?= $no++; ?></td>
    <td><?= $row->id_karyawan ?></td>
    <td><?= $row->nama ?></td>
    <td><?= $row->tempat_tugas ?></td>
    <td><?= $row->tali_asih ?></td>
    <td><?= $row->terbilang_3 ?></td>
    <td>
      <div class="mb-2">
      <a target="_blank" href="<?= base_url('laporanpdf/printpb/'.$row->id_karyawan) ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-check"></i>
      </a>
     <?php if(empty($row->file_taliasih)) { ?>
        <button type="button" title="edit data" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#exampleModal<?= $row->id_karyawan ?>">
              <i class="fa fa-book"></i>
        </button>
     <?php }else { ?>
      <a title="backup data" href="javascript:backup(<?= $row->id ?>)" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-hdd"></i> </a>
     <?php  } ?>
     <a class="btn btn-danger btn-circle btn-sm" href ="javascript:del(<?= $row->id ?>)"><i class="fa fa-trash  "></i> </a>
      </div>
    </td>
  </tr>
  <?php endforeach ?>
    </tbody>


  </table>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  function backup(id){
    swal({
      title: "Data Lengkap ! ! !",
      text: "Silahkan Backup Data Sekarang",
      icon: "warning",
      buttons: [true,"Backup"],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
            url : "<?= base_url('superadmin/Taliasih/backup') ?>",
            method : "POST",
            data : "id="+id ,
            success : function(response){
              swal({
                icon : "success",
                title : response 
              }).then(function(){
                window.location.href="<?= base_url('superadmin/Taliasih') ?>"
              });

              return false ;
            }

          })
      }
    });
  }
</script>

<?php 

 foreach($result as $row) : ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $row->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="load" style="position: absolute;z-index: 9;display: flex;margin : 150px 200px;">
      <img id="loading" style="display: none;" src="<?= base_url('assets/img/load.gif') ?>" >
    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Taliasih</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  method="post" enctype="multipart/form-data" id="form<?= $row->id ?>">
        <label>Taliasih Tertanda Tangan</label>
        <input type="hidden" name="npk" value="<?= $row->npk ?>">
        <input type="hidden" name="id" value="<?= $row->id ?>">
        <input type="file" name="file_taliasih" onchange="return validasi(<?= $row->id ?>)" id="file_taliasih<?= $row->id ?>" class="form-control" >
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit"  class="btn btn-primary" value="Upload File" name="upload">
        </form><br>
      </div>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $("#form"+<?= $row->id ?>).on('submit',function(event){
          event.preventDefault();
          var file  = document.getElementById('file_taliasih'+<?= $row->id ?>).value ;
            if(file == ""){
              swal({
                title : "Perhatian",
                icon : "error",
                text : "file kosong",
                dangerMode : [true,"Ok"]
                
              });
              return false ;
            }else {
              $.ajax({
                url : "<?= base_url('superadmin/Taliasih/upload') ?>",
                method : "post",
                data : new FormData(this),
                processData : false ,
                contentType : false ,
                cache : false ,
                beforeSend :  function(){
                  $("#loading").show();
                },
                complete : function(){
                  $("#loading").hide()
                },
                success : function(response){
                    if(response == "Sukses"){
                        swal({
                          title : "Berhasil",
                          icon : "success"               
                        }).then(function(){
                          window.location.href="<?= base_url('superadmin/Taliasih') ?>"
                        })
                    }else {
                        swal({
                          title : "Perhatian",
                          icon : "error",
                          text :"Gagal"                  
                        }).then(function(){
                          window.location.href="<?= base_url('superadmin/Taliasih') ?>"
                        })
                    
                    }
                  }
              })
                
            }
        })
      return false ;
  })
</script>

<?php endforeach ?>

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
            url : "<?= base_url('superadmin/Taliasih/delete') ?>",
            method : "POST",
            data : "id="+id ,
            success : function(response){
              swal({
                icon : "success",
                title : "Terhapus",
              }).then(function(){
                window.location.href="<?= base_url('superadmin/Taliasih') ?>"
              });

              return false ;
            }

          })
      }
    });
  }



  function validasi(id){
    var file = document.getElementById("file_taliasih"+id);
    var path = file.value ;
    var  exe = /(\.jpeg|\.png|\.jpg|\.pdf)$/i ;

      if(!exe.exec(path)){
        swal({
          icon : "error",
          title : "File di Tolak",
          dangerMode : [true,"Ok"]
        });
        file.value = "";
        return false ;
      }
  }
</script>
