 <!-- Begin Page Content -->
<div class="container-fluid">
 <!-- DataTales Example -->
    <!-- DataTales Example -->
   <!-- Ga semua SG dapet tali asih dari user -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">PKWT Anggota</h6>
               </div>
               <div class="card-body">
   <div class="table-responsive-sm ml-4 mr-3">
    <div class="form-inline">
      <form action="<?= base_url('superadmin/Pkwt') ?>" method="post">
          <input type="text" name="keyword" class="form-control " placeholder="Search ">
          <input type="submit" name="submit" class="btn btn-primary" value="Cari">
      </form>
    </div>
      <b class="mb-2"><i><?= $result . ' Data Anggota' ?></i></b>
     <table id="dataTable3" class="table table-bordered">

     <thead>
       <tr>
         <th scope="col">No</th>
         <th scope="col">NPK</th>
         <th scope="col">Nama</th>
         <th scope="col">Instalasi</th>
         <!-- tanggal Taliasih tanggal cetak pkwt -->
         <th>PKWT</th>
         <th scope="col">Mulai</th>
         <!-- Tanggal Berakhir pkwt -->
         <th scope="col">Akhir</th>
         <th width="15%">Status</th>
       </tr>
     </thead>

     <tbody>
      <?php $no = 1 ; foreach($item as $row) : ?>
      <tr>
        <td><?= ++$start ?></td>
        <td><?= $row->npk_br ?></td>
        <td><?= $row->nama ?></td>
        <td><?= $row->tempat_tugas ?></td>
        <td><?= $row->pkwt ?></td>
        <td><?= $row->start ?></td>
        <td><?= $row->end_date ?></td>
        <td>
          <div class="mb-2">
           
            <!-- jika kondisi file pkwt tertanda tangan sudah penuh maka bisa di re-print -->
       
             <a target="_blank" title="cetak PDF" href="<?= base_url('Laporanpdf/printpkwt/'.$row->npk_br) ?>" class="btn btn-success btn-circle btn-sm">
              <i class="fas fa-file-pdf"></i>
            </a>
           
           <!-- jika file pkwt penuh maka tombol upload berkas  -->
           <?php if(empty($row->file_pkwt)) { ?>
            <button type="button" title="edit data" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#exampleModal<?= $row->id_karyawan ?>">
              <i class="fa fa-book"></i>
            </button>
          <?php }else { ?>
            <!-- backup file pkwt tertanda tangan -->
            <a title='backup data' href="javascript:backup(<?= $row->id ?>)" class='btn btn-warning btn-circle btn-sm'><i class='fa fa-hdd'></i> </a>
          <?php } ?>


          <a class="btn btn-danger btn-circle btn-sm" href ="javascript:del(<?= $row->id ?>)"><i class="fa fa-trash  "></i> </a>
          </div>
        </td>
       </tr>
      <?php endforeach ?>

       </tbody>


     </table>

     <?= $pagination ?>
   </div>
   </div>
   </div>
   </div>

</div>

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
            url : "<?= base_url('superadmin/Pkwt/delete') ?>",
            method : "POST",
            data : "id="+id ,
            success : function(response){
              swal({
                icon : "success",
                title : "Terhapus",
              }).then(function(){
                window.location.href="<?= base_url('superadmin/Pkwt') ?>"
              });

              return false ;
            }

          })
      }
    });
  }


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
            url : "<?= base_url('superadmin/Pkwt/backup') ?>",
            method : "POST",
            data : "id="+id ,
            success : function(response){
              swal({
                icon : "success",
                title : response,
              }).then(function(){
                window.location.href="<?= base_url('superadmin/Pkwt') ?>" ;
              });

              return false ;
            }

          })
      }
    });
  }
</script>

<?php 

 foreach($item as $row) : ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $row->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="load" style="position: absolute;z-index: 9;display: flex;margin : 150px 200px;">
      <img id="loading" style="display: none;" src="<?= base_url('assets/img/load.gif') ?>" >
    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload PKWT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if(!empty($row->file_pkwt)){ ?>

          <embed type="application/pdf" src="<?= base_url('assets/upload/backup_taliasih/'.$row->file_pkwt) ?>"></embed>
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
       <?php } else { ?> 

        <form enctype="multipart/form-data" action="" id="form<?= $row->id ?>"   method="post">
          <div class="form-group">
            <!-- onchange="return pdf(<?= $row->id ?>)" -->
            <label>PKWT Tertanda Tangan</label>
            <div class="form-control">
            <input onchange="return pdf(<?= $row->id ?>)" type="file" id="file<?= $row->id ?>" name="file_pkwt" >
          </div>
            <input type="hidden" name="id" value="<?= $row->id ?>">
            <input type="hidden" name="npk" value="<?= $row->npk_br ?>">
            <input type="hidden" name="pkwt" value="<?= $row->pkwt ?>">
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Upload File" name="upload">
        </form><br>
      </div>
      <?php  } ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

        $("#form"+<?= $row->id ?>).on('submit',function(event){
          event.preventDefault();
          var file  = document.getElementById('file'+<?= $row->id ?>).value ;
            if(file == ""){
              swal({
                title : "Perhatian",
                icon : "error",
                text : "file kosong",
                dangerMode : [true,"Ok"]
                
              });
              return false ;
            }else {
              var sync = "<?= $row->pkwt . '-' . $row->npk_br ?> " ;
              $.ajax({
                url : "<?= base_url('superadmin/pkwt/upload') ?>",
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
                    swal({
                        icon : "success",
                        title : response                  
                    }).then(function(){
                      window.location.href="<?= base_url('superadmin/Pkwt') ?>"
                    })
                  
                }
              })
                
            }
        })
      return false ;
  })
</script>
<?php endforeach ?>


<script type="text/javascript">
  function pdf(id)  {
    var file = document.getElementById('file'+ id);
    var path = file.value ;
    var exe = /(\.pdf|\.png|\.jpeg|\.jpg)$/i ;
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
<script type="text/javascript">
  
  function ijazah(id){
    alert("hello");
    return false ;
  }
</script>


<!-- 
     <form action="" method="post">
       <div class="form-inline mb-4">
        <input placeholder="Cari Karyawan" type="text" name="npk2" id="npk"  class="form-control form-control-sm col-lg-4">
        <button id="view" type="button" class="btn btn-danger btn-sm ml-3"><i class="fa fa-search"></i> Cari </button>
        <div id="close" style="display: none;"><button type="button" id="reset" class="btn btn-primary btn-sm ml-2">Reset Pencarian</button>
      </div>
      </div>
    </form>

    <div id="review-pkwt"></div>
 -->





<script type="text/javascript">
  $(document).ready(function(){
    $("#view").click(function(){
        var npk = document.getElementById('npk').value ;
          if(npk == ""){
            swal({
                  title : "Perhatian",
                  text : "kata kunci masih kosong",
                  icon : "warning",
                  dangerMode : [true, "ok"]
                })
          } else {

              $.ajax({
                url : "<?= base_url('superadmin/Pkwt/loadPKWT') ?>",
                method : "POST",
                data : "npk=" + npk ,
                success : function(msg){
                  if(msg == "Gagal"){
                      swal({
                        title : "Oops",
                        text : "NPK Tidak Ditemukan",
                        icon : "error",
                        dangerMode : [true, "ok"]
                      })
                      $('input').val('');
                  }else {
                    $("#review-pkwt").html(msg);
                    $("#close").show();
                  }
                }
              })
          }
    })

    $("#close").click(function(){
      $("#close").hide();
      $("#review-pkwt").html("");
      $('input').val('');
    })
  })

</script>
