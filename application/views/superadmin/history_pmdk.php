<!-- Begin Page Content -->
<div class="container-fluid">
<!-- DataTales Example -->
   <!-- DataTales Example -->
  <!-- Ga semua SG dapet tali asih dari user -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">History PMDK</h6>
              </div>
              <div class="card-body">
  <div class="table-responsive-sm ml-4 mr-3">
   <div class="form-inline">
     <!-- <form action="<?= base_url('superadmin/History/pkwt') ?>" method="post">
         <input type="text" name="keyword" class="form-control " placeholder="Search ">
         <input type="submit" name="submit" class="btn btn-primary" value="Cari">
     </form> -->
   </div>
<!--       <b class="mb-2"><i><?= $result . ' History PKWT Data Anggota' ?></i></b> -->
    <table id="dataTable" class="table table-bordered">

    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">NPK</th>
        <th scope="col">Nama</th>
        <th scope="col">Instalasi</th>
        <th>PKWT</th>
        <!-- tanggal Taliasih tanggal cetak pkwt -->
        <th scope="col">Mulai</th>
        <!-- Tanggal Berakhir pkwt -->
        <th scope="col">Akhir</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>

    <tbody id="show-pkwt"></tbody>


    </table>
  </div>
  </div>
  </div>
  </div>


</div>

<script type="text/javascript">
 $(document).ready(function(){
     $.ajax({
       url : "<?= base_url('superadmin/History/getPKWT') ?>",
       type : 'ajax' ,
       async : false ,
       dataType : 'json',
       success : function(msg){
          var i ;
          var html ;
          var j = 1 ;
           for(i=0 ; i < msg.length ; i++){
               html += '<tr>'+
                       '<td>'+ j +'</td>'+
                       '<td>'+  msg[i].npk_br +'</td>'+
                       '<td>'+  msg[i].nama +'</td>'+
                       '<td>'+ msg[i].tempat_tugas +'</td>'+
                       '<td>'+ msg[i].pkwt +'</td>'+
                       '<td>'+ msg[i].start +'</td>'+
                       '<td>'+ msg[i].end_date +'</td>'+
                       '<td><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal'+ msg[i].id +'" >View</button></td>'+
                       '</tr>';
               j++ ;
           }
           $("#show-pkwt").html(html);


       }
     })
 })
</script>

<?php

foreach($item as $row) : ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">PKWT</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <iframe src = "<?= base_url('assets/upload/backup_pkwt/'. $row->file_pkwt) ?>" type = "application / pdf" width = "100%" height = "600px" />
       </iframe>
               <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </form>
     </div>
     </div>
   </div>
 </div>
</div>

<?php endforeach ?>
