 <!-- Begin Page Content -->
<div class="container-fluid"  >
 <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Histori PKWT</h6>
    </div>
    <div class="card-body">
  <div class="row">
      <!-- tracking pwkt -->
      <div class="col-lg-6" >
        <div class="text-center tracking-status-intransit">
               <p class="tracking-status text-tight">tracking history pkwt anggota</p>
            </div>
        <?php foreach($pkwt as $row) : ?>
         <div class="tracking-list">
               <div class="tracking-item">
                  <div class="tracking-icon status-intransit">
                     <i class="fas fa-circle"></i>
                  </div>
                  <div class="tracking-date">Tanggal PKWT <?= $row->tgl ?></div>
                  <div class="tracking-content"><u class="text-primary"><a href="javascript:file<?= $row->id ?>()"><?= $row->pkwt ?> </a> </u> </div>
               </div>
        </div>
        <script type="text/javascript">
          function file<?= $row->id ?>(){
            window.open("<?= base_url("assets/upload/backup_pkwt/".$row->file_pkwt) ?>","width=650","height=650","menubar=yes","resizeable=yes");
          }
        </script>
      <?php endforeach; ?>


      </div>

      <!-- end tracking pkwt -->


      <!-- tracking taliasih -->
      <div class="col-lg-6">
          <div class="text-center tracking-status-intransit">
               <p class="tracking-status text-tight">tracking history Taliasih anggota</p>
            </div>
         <?php foreach($pb as $item) : ?>
         <div class="tracking-list">
               <div class="tracking-item">
                  <div class="tracking-icon status-intransit">
                     <i class="fas fa-circle"></i>
                  </div>
                  <div class="tracking-date">Tanggal Taliasih <?= $item->tanggal ?></div>
                  <div class="tracking-content"><u class="text-primary"><a href="javascript:file<?= $item->id ?>()"><?= $item->file_taliasih ?> </a> </u> </div>
               </div>

      <script type="text/javascript">
          function file<?= $item->id ?>(){
            window.open("<?= base_url("assets/upload/backup_taliasih/".$item->file_taliasih) ?>","width=650","height=650","menubar=yes","resizeable=yes");
          }
        </script>
      <?php endforeach; ?>
        </div>
      </div>




    </div>
  </div>
</div>

</div>

