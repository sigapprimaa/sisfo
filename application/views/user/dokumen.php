 <!-- Begin Page Content -->
<div class="container-fluid">
 <!-- DataTales Example -->
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kelengkapan Berkas</h6>
            </div>
            <div class="card-body">
<div class="table-responsive">
  <table  class="table table-bordered table-sm">
    <thead class="thead-primary">
    <tr class="bg-primary text-white">
      <th scope="col">No</th>
      <th scope="col">Nama File</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td>1</td>
        <td>Domisili</td>
        <td>
          <?php
            if(empty($berkas->surat_domisili)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open0('<?= $berkas->surat_domisili ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Ijazah</td>
        <td>
          <?php
            if(empty($berkas->file_pendidikan)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open1('<?= $berkas->file_pendidikan ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
      <tr>
        <td>3</td>
        <td>Kartu Keluarga</td>
        <td>
          <?php
            if(empty($berkas->file_kk)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open2('<?= $berkas->file_kk ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
      <tr>
        <td>4</td>
        <td>KTP</td>
        <td>
          <?php
            if(empty($berkas->file_ktp)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open3('<?= $berkas->file_ktp ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
      <tr>
        <td>5</td>
        <td>NPWP</td>
        <td>
          <?php
            if(empty($berkas->file_npwp)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open4('<?= $berkas->file_npwp ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
      <tr>
        <td>6</td>
        <td>Buku Rekening</td>
        <td>
          <?php
            if(empty($berkas->buku_rekening)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open5('<?= $berkas->buku_rekening ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
      <tr>
        <td>7</td>
        <td>Daftar Riwayat Hidup</td>
        <td>
          <?php
            if(empty($berkas->daftar_riwayat_hidup)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open6('<?= $berkas->daftar_riwayat_hidup ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
      <tr>
        <td>8</td>
        <td>SKCK</td>
        <td>
          <?php
            if(empty($berkas->skck)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open7('<?= $berkas->skck ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
      <tr>
        <td>9</td>
        <td>Surat Lamaran</td>
        <td>
          <?php
            if(empty($berkas->surat_lamaran)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open8('<?= $berkas->surat_lamaran ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
      <tr>
        <td>10</td>
        <td>Surat Referensi</td>
        <td>
          <?php
            if(empty($berkas->surat_referensi)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open9('<?= $berkas->surat_referensi ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
      <tr>
        <td>11</td>
        <td>Surat Sehat</td>
        <td>
          <?php
            if(empty($berkas->surat_sehat)){ ?>
              <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
            <?php }else { ?>
              <a href="javascript:open10('<?= $berkas->surat_sehat ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
           <?php } ?>
          </td>
      </tr>
        <tr>
          <td>12</td>
          <td>Kartu Tanda Anggota</td>
          <td>
            <?php
              if(empty($berkas->file_kta)){ ?>
                <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
              <?php }else { ?>
                <a href="javascript:open10('<?= $berkas->file_kta ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
             <?php } ?>
            </td>
        </tr>
        <tr>
          <td>13</td>
          <td>Ijazah Gada Pratama</td>
          <td>
            <?php
              if(empty($berkas->gadapratama)){ ?>
                <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
              <?php }else { ?>
                <a href="javascript:open10('<?= $berkas->gadapratama ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
             <?php } ?>
            </td>
        </tr>
        <tr>
          <td>14</td>
          <td>Ijazah Gada Madya</td>
          <td>
            <?php
              if(empty($berkas->gadamadya)){ ?>
                <button class="btn btn-sm btn-danger">Data Belum Lengkap</button>
              <?php }else { ?>
                <a href="javascript:open10('<?= $berkas->gadamadya ?>')" class="btn btn-sm btn-success">Berkas Lengkap</a>
             <?php } ?>
            </td>
        </tr>
  </tbody>
  </table>
  <span class="text-primary small"><i>* klik di tombol status untuk lihat berkas *</i></span>
</div>
</div>
</div>
</div>

<?php
  $folder = array('Domisili','Ijazah','Kartu Keluarga','KTP','NPWP','Rekening','Riwayat Hidup','SKCK','Surat Lamaran','Surat Referensi','Surat Sehat','KTA','GadaPratama','GadaMadya');
  for ($i=0; $i < count($folder) ; $i++) { ?>
    <script type="text/javascript">
      function open<?= $i ?>(file){
       window.open("<?= base_url("assets/upload/berkas/".$folder[$i] . "/") ?>"+file,"width=650","height=650","menubar=yes","resizeable=yes");
      }
    </script>
  <?php }  ?>
