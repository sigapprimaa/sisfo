<!-- Begin Page Content -->
<div class="container-fluid">
<!-- DataTales Example -->
   <!-- DataTales Example -->
  <!-- Ga semua SG dapet tali asih dari user -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">History Tali Asih</h6>
              </div>
              <div class="card-body">
  <div class="table-responsive-sm ml-4 mr-3">

  <!--  
    <form action="<?= base_url('superadmin/History/tal') ?>" method="post">
         <input type="text" name="keyword" class="form-control " placeholder="Search ">
         <input type="submit" name="submit" class="btn btn-primary" value="Cari">
     </form>
   </div>
     <b class="mb-2"><i><?= $result . ' History PKWT Data Anggota' ?></i></b>  -->
    <table id="dataTable" class="table table-bordered">

    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">NPK</th>
        <th scope="col">Nama</th>
        <th scope="col">Instalasi</th>
        <th>Tali asih</th>
        <!-- Jumlah Tali asih yang di bayar -->
        <th scope="col">Nominal</th>
        <!-- Tanggal Pembayran -->
        <th scope="col">Tanggal Pembayaran</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody id="show-pb"></tbody>
    </table>
<script type="text/javascript">
$(document).ready(function(){
  $.ajax({
    url : "<?= base_url('superadmin/History/getPB') ?>",
    type : 'ajax' ,
    async : false ,
    dataType : 'json',
    success : function(msg){
        var i ;
        var j = 1 ;
        var html ;
        for(i = 0  ; i < msg.length ; i++){

            html+= '<tr>'+
                    '<td>'+  j  +'</td>'+
                    '<td>'+ msg[i].npk + '</td>'+
                    '<td>'+ msg[i].nama + '</td>'+
                    '<td>'+ msg[i].tempat_tugas + '</td>'+
                    '<td>'+ msg[i].tali_asih + '</td>'+
                    '<td>'+ msg[i].terbilang_3 + '</td>'+
                    '<td>'+ msg[i].tgl_terbilang + '</td>'+
                    '<td><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal'+ msg[i].id_karyawan +'" >View</button></td>'+
                    '</tr>';
                    j++ ;
        }
        $("#show-pb").html(html);
    }
  })
})
</script>


<?php 

 foreach($item as $row) : ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $row->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Taliasih</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if(!empty($row->file_taliasih)) : ?>
        <iframe src = "<?= base_url('assets/upload/backup_taliasih/'. $row->file_taliasih) ?>" type = "application / pdf" width = "100%" height = "600px" />
        </iframe>

      <?php endif ; ?>
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>

<?php endforeach ?>