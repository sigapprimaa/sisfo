<?php  $data = $this->db->get_where('karyawan',array('npk' => $this->session->userdata('npk')))->row(); ?>
<div class="container-fluid">

      <div class="alert alert-success" role="alert">
      <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard
    </div>
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Selamat Datang <?= $data->nama ?>!</h4>
      <!-- Tambahkan Session login nama, dan level  -->
      <p>Sistem Informasi Master Data SIGAP PRIMA ASTREA. Anda Login  Sebagai <?php echo $this->session->role_id == 3 ?  "Anggota" : "" ; ?></p>
      <hr>
    
    </div>

          <!-- Button trigger modal -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs mr-2"></i>Control Panel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Biodata</p></a>
                <i class="fas fa-3x fa-user ml-1"></i>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
</div>
  <?php if($this->session->userdata("logout")) { ?>
      <script>
        alert("Level User Beda")
      </script>
  <?php } ?>