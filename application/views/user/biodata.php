

<!-- Begin Page Content -->
<div class="container-fluid">
  <ul class="nav nav-tabs responsive" id="myTab" role="tablist">
    <li class="nav-item responsive">
      <a class="btn btn-danger success" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Biodata</a>
    </li>
    <li class="nav-item responsive ml-2">
      <a class="btn btn-primary  "  id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Employee Information</a>
    </li>
    <li class="nav-item responsive  ml-2">
      <a class="btn btn-warning " id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Pendidikan dan Pengalaman</a>
    </li>

    <li class="nav-item responsive  ml-2">
      <a class="btn btn-info " id="contact-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">Daftar Keluarga</a>
    </li>
  </ul>
  <hr>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="row">
      <div class="col-lg-responsive">
        <img height="350" width="350" src="<?= base_url("assets/upload/berkas/poto/".$item2->photo) ?>">
      </div>
      <div class="col-lg-8">
      <table class="table table-striped">

          <td>NPK</td>
          <td>:</td>
          <td><?= $item->npk ?></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><?= $item->nama ?></td>
        </tr>

        <tr>

          <td>Tempat, Tangal Lahir</td>
          <td>:</td>
          <td><?= $item->tempat_lahir ?>, <?= $item->tgl_lahir ?></td>
        </tr>

        <tr>
          <td>Agama</td>
          <td>:</td>
          <td><?= $item->agama ?></td>
        </tr>

        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?= $item->alamat ?></td>
        </tr>
        <tr>
          <td>No KTP</td>
          <td>:</td>
          <td><?= $item->nik ?></td>
        </tr>
        <tr>
          <td>No Kartu Keluarga</td>
          <td>:</td>
          <td><?= $item->no_kk ?></td>
        </tr>
        <tr>
          <td>Tinggi Badan</td>
          <td>:</td>
          <td><?= $item->tinggi ?> cm</td>
        </tr>
        <tr>
          <td>Berat Badan</td>
          <td>:</td>
          <td><?= $item->berat ?> kg</td>
        </tr>
        <tr>
          <td>Ukuran Baju / Seragam</td>
          <td>:</td>
          <td><?= $item->baju ?> </td>
        </tr>
        <tr>
          <td>Ukuran Celana</td>
          <td>:</td>
          <td><?= $item->celana ?> nomor</td>
        </tr>
        <tr>
          <td>Ukuran Sepatu </td>
          <td>:</td>
          <td><?= $item->sepatu ?> nomor</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary pull right" data-toggle="modal" data-target="#exampleModal<?= $item->id_karyawan ?>">
            Update Biodata
          </button>        <!-- end of status  -->
        </td>
      </tr>
      </table>
 </div></div></div>




    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <!-- status karyawan -->
        <table class="table table-striped">
               <tr>
                <td>Status karyawan</td>
                <td>:</td>
                <td><?= $item2->status ?></td>
              </tr>

                <tr>
                 <td>ARH</td>
                 <td>:</td>
                 <td><?= $item2->arh1 ?></td>
              </tr>

               <tr>
                <td>Instalasi</td>
                <td>:</td>
                <td><?= $item2->instalasi ?></td>
               </tr>

                  <tr>
                    <td>Position Status</td>
                    <td>:</td>
                    <td><?= $item2->status ?></td>
                  </tr>

                  <tr>
                   <td>No.Reg.KTA</td>
                   <td>:</td>
                   <td><?= $item2->no_kta ?></td>
                 </tr>

                 <tr>
                  <td>Tgl Berakhir KTA</td>
                  <td>:</td>
                  <td><?= $item2->tgl_berakhir_kta ?></td>
                </tr>

                <tr>
                 <td>Gada Pratama</td>
                 <td>:</td>
                 <td><?= $item2->gada_pratama ?></td>
               </tr>

               <tr>
                <td>Gada Madya</td>
                <td>:</td>
                <td><?= $item2->gada_madya ?></td>
              </tr>

              <tr>
               <td>Status Pajak</td>
               <td>:</td>
               <td><?= $item2->status_pajak ?></td>
             </tr>

             <tr>
              <td>BPJS Kesehatan</td>
              <td>:</td>
              <td><?= $item2->bpjs_kesehatan ?></td>
            </tr>

            <tr>
             <td>BPJS Ketenagakerjaan</td>
             <td>:</td>
             <td><?= $item2->bpjs_ktu ?></td>
           </tr>

      </table>

    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <!-- begin data Keluarga -->
      <table class="table table-striped">
             <tr>
              <td>Pendidikan Terakhir</td>
              <td>:</td>
              <td><?= $item3->pendidikan_terakhir ?></td>
            </tr>

            <tr>
             <td>Jurusan SMA/SMK/Perguruan Tinggi</td>
             <td>:</td>
             <td><?= $item3->jurusan ?></td>
            </tr>

           <tr>
            <td>Nama Sekolah / Perguruan Tinggi</td>
            <td>:</td>
            <td><?= $item3->nama_sekolah ?></td>
           </tr>

           <tr>
            <td>Tahun Lulus</td>
            <td>:</td>
            <td><?= $item3->tahun_lulus ?></td>
          </tr>

          <tr>
           <td>Rata-rata Nilai Sekoalah / IPK</td>
           <td>:</td>
           <td><?= $item3->ipk ?></td>
         </tr>

         <tr>
          <td>SKILL</td>
          <td>:</td>
          <td>
              <?php foreach($skill as $row) : ?>
                <p><?= $row->skill ?></p>
              <?php endforeach ; ?>
          </td>
        </tr>

         <tr>
          <td>Pengalaman Pekerjaan</td>
          <td>:</td>
          <td>
              <?php foreach($pengalaman as $row) : ?>
                <p><?= $row->pengalaman ?></p>
              <?php endforeach ; ?>
          </td>
        </tr>
    </table>
      <!-- end data Keluarga -->
    </div>

    <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab">
      <!-- begin data Keluarga -->
      <table class="table table-striped">
             <tr>
              <td>Nama Istri/NIK</td>
              <td>:</td>
              <td><?= $keluarga->nama. " / " . $keluarga->nik ?></td>
            </tr>

            <tr>
             <td>No BPJS</td>
             <td>:</td>
             <td><?= $keluarga->no_bpjs ?></td>
           </tr>

             <tr>
              <td>Tingkat Faskes</td>
              <td>:</td>
              <td><?= $keluarga->faskes ?></td>
            </tr>


            <?php $no = 1 ; foreach($keluarga2 as  $p ) : ?>
            <tr>
             <td>Nama Anak <?= $no++ ?>/NIK</td>
             <td>:</td>
             <td><?= $p->nama . " / " . $p->nik ?></td>
           </tr>
           <tr>
            <td>NO BPJS</td>
            <td>:</td>
            <td><?= $p->no_bpjs ?></td>
          </tr>
          <tr>
           <td>Tingkat Faskes</td>
           <td>:</td>
           <td><?= $p->faskes ?></td>
         </tr>
         <?php endforeach ; ?>


    </table>
      <!-- end data Keluarga -->
    </div>

  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



              <?php /* foreach($showModal->result() as $show) :*/ ?>
              <!-- Modal -->
          <div class="modal fade" id="exampleModal<?= $item->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Biodata</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                          <div class="load" style="position: absolute;z-index: 9;display: flex;margin : 50px 250px;">
                        <img id="loading" style="display: none;" src="<?= base_url('assets/img/load.gif') ?>" >
                      </div>
                            <form method="post" id="form<?= $item->id ?>">
                              <div class="row">
                                <div class="col-lg-6">
                                  <label for="">Nama Lengkap</label>
                                  <input type="hidden" name="id" value="<?= $item->id ?>">
                                  <input type="hidden" name="id_karyawan" value="<?= $item->id_karyawan ?>">
                                  <input type="text" name="nama" id="nama" value="<?= $item->nama ?>" class="form-control" placeholder="">

                                    <label for="">Tempat Lahir </label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= $item->tempat_lahir ?>" class="form-control"  placeholder="">
                                      <label class="control-label" for="date">Tanggal Lahir</label>
                                      <input class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $item->tgl_lahir ?>" type="text"/>

                                    <label for="">Agama</label>
                                    <input type="text" name="agama" id="agama" value="<?= $item->agama ?>" class="form-control" >

                                    <label for="">Alamat Lengkap</label>
                                    <textarea id="alamat" name="alamat" class="form-control" placeholder=""><?= $item->alamat ?></textarea>

                                    <label for="">Nomor KTP</label>
                                    <input type="text" id="ktp" name="nik" value="<?= $item->nik ?>" class="form-control" placeholder="">

                                    <label for="">Nomor Kartu Keluarga</label>
                                    <input type="text" name="no_kk" id="no_kk"  value="<?= $item->no_kk ?>" class="form-control" placeholder="">

                                    <label for="">Ukuran Baju / Seragam</label>
                                    <input type="text" name="baju" id="baju"  value="<?= $item->baju ?>" class="form-control" placeholder="">
                                  </div>
                                <div class="col-lg-6">
                                    <label for="">Ukuran celana</label>
                                    <input type="text" name="celana" id="celana"  value="<?= $item->celana ?>" class="form-control" placeholder="">

                                    <label for="">Nomor Sepatu</label>
                                    <input type="text" name="sepatu" id="sepatu"  value="<?= $item->sepatu ?>" class="form-control" placeholder="">

                                    <label for="">Pendidikan Terakhir</label>
                                    <input type="text" name="pendidikan_terakhir" id="pendidikan" value="<?= $item3->pendidikan_terakhir ?>" class="form-control" placeholder="">
                                    <label for="">Jurusan SMA/SMK/Perguruan Tinggi</label>
                                    <input type="text" name="jurusan" id="jurusan" value="<?= $item3->jurusan ?>" class="form-control" placeholder="">

                                    <label for="">Nama Sekolah</label>
                                    <input type="text" name="nama_sekolah" id="nama_sekolah" value="<?= $item3->nama_sekolah ?>" class="form-control" placeholder="">

                                    <label for="">Tahun Lulus</label>
                                    <input type="text" name="tahun_lulus" value="<?= $item3->tahun_lulus ?>" id="tahun_lulus" class="form-control" placeholder="">

                                    <label for="">Rata Rata Nilai</label>
                                    <input type="text" name="ipk" value="<?= $item3->ipk ?>" id ="ipk" class="form-control" placeholder="">


                                    <label for="">SKILL atau Kemampuan</label>
                                    <a href="javascript:add()" >+</a>
                                    <a href="javascript:close()" >-</a>
                                    <script type="text/javascript">
                                      function add(){
                                          $(document).ready(function(){
                                              $("#add-skill").html('<input placeholder="Enter new skill" class="form-control" type="text" name="skill[]" ><input  placeholder="Enter new skill" class="form-control" type="text" name="skill[]" >');
                                          })
                                      }
                                      function close(){
                                          $(document).ready(function(){
                                              $("#add-skill").html('');
                                          })
                                      }
                                    </script>
                                   <?php foreach($skill as $d): ?>
                                      <input class="form-control" type="text" name="skill[]" value="<?= $d->skill ?>">
                                    <?php  endforeach ?>
                                    <div id="add-skill"></div>


                                    <label for="">Pengalaman Kerja</label>
                                    <a href="javascript:add2()" >+</a>
                                    <a href="javascript:close2()" >-</a>
                                    <script type="text/javascript">
                                      function add2(){
                                          $(document).ready(function(){
                                              $("#add-pengalaman").html('<input placeholder="Enter new pengalaman" class="form-control" type="text" name="pengalaman[]" ><input  placeholder="Enter new pengalaman" class="form-control" type="text" name="pengalaman[]" >');
                                          })
                                      }
                                      function close2(){
                                          $(document).ready(function(){
                                              $("#add-pengalaman").html('');
                                          })
                                      }
                                    </script>
                                   <?php foreach($pengalaman as $d): ?>
                                      <input class="form-control" type="text" name="pengalaman[]" value="<?= $d->pengalaman?>">
                                    <?php  endforeach ?>
                                    <div id="add-pengalaman"></div>

                                </div>
                              </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" id="submit" class="btn btn-primary">Simpan Perubahan</button>
                   </form>
                    </div>
                  </div>
                </div>
              </div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#form<?= $item->id ?>").on('submit',function(event){
      event.preventDefault();
        var nama = document.getElementById('nama').value ;
        var tempat_lahir = document.getElementById('tempat_lahir').value ;
        var tgl_lahir = document.getElementById('tgl_lahir').value ;
        var agama = document.getElementById('agama').value ;
        var alamat = document.getElementById('alamat').value ;
        var ktp = document.getElementById('ktp').value ;
        var no_kk = document.getElementById('no_kk').value ;
        var pendidikan = document.getElementById('pendidikan').value ;
        var jurusan = document.getElementById('jurusan').value ;
        var nama_sekolah = document.getElementById('nama_sekolah').value ;
        var tahun_lulus = document.getElementById('tahun_lulus').value ;
        if(nama == ""){
            swal({
              icon : "error",
              title : "nama masih kosong",
              dangerMode : [true,"Ok"]
            });
          }else if(tempat_lahir == ""){
            swal({
              icon : "error",
              title : "tempat lahir masih kosong",
              dangerMode : [true,"Ok"]
            });
          }else if(tgl_lahir == ""){
            swal({
              icon : "error",
              title : "tanggal lahir masih kosong",
              dangerMode : [true,"Ok"]
            });
          }else if(agama == ""){
            swal({
              icon : "error",
              title : "agama masih kosong",
              dangerMode : [true,"Ok"]
            });
          }else if(alamat == ""){
            swal({
              icon : "error",
              title : "alamat masih kosong",
              dangerMode : [true,"Ok"]
            });
          }else if(ktp == ""){
            swal({
              icon : "error",
              title : "nomor ktp masih kosong",
              dangerMode : [true,"Ok"]
            });
          }else if(no_kk == ""){
            swal({
              icon : "error",
              title : "nomor kartu keluarga masih kosong",
              dangerMode : [true,"Ok"]
            });
          }else if(pendidikan == ""){
            swal({
              icon : "error",
              title : "pendidikan masih kosong",
              dangerMode : [true,"Ok"]
            });
          }else if(jurusan == ""){
            swal({
              icon : "error",
              title : "jurusan masih kosong",
              dangerMode : [true,"Ok"]
            });
          }else if(nama_sekolah == ""){
            swal({
              icon : "error",
              title : "nama sekolah masih kosong",
              dangerMode : [true,"Ok"]
            });
          }else if(tahun_lulus == ""){
            swal({
              icon : "error",
              title : "tahun lulus masih kosong",
              dangerMode : [true,"Ok"]
            });

          }else {
             $.ajax({
                url : "<?= base_url('user/biodata/update') ?>",
                data : new FormData(this),
                method : "POST",
                contentType : false ,
                processData : false ,
                cache : false ,
                beforeSend : function(){
                  $("#loading").show();
                },
                complete : function(){
                  $("#loading").hide();
                },
                success : function(response){
                    swal({
                      icon : "success",
                      title : response
                    }).then(function(){
                      window.location.href="<?= base_url('user/biodata') ?>" ;
                    })

                }
             })
          }
    })
  })
</script>


<?php /*endforeach ;*/ ?>
