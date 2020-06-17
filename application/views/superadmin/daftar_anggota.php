 <!-- Begin Page Content -->
<div class="container-fluid">
 <!-- DataTales Example -->
    <a class="btn btn-success mb-2" href="<?= base_url("superadmin/Export") ?>"><i class="fa fa-file-excel"></i> Export to Excel </a>
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
            </div>
            <div class="card-body">
<div class="table-responsive-sm ml-4 mr-3">
  <table id="dataTable"  class="table table-bordered">
    <thead class="thead-success">
    <tr class="table-success">
      <th scope="col">No</th>
      <th scope="col">NPK</th>
      <th scope="col">Nama</th>
      <th scope="col">No Handphone</th>
      <th scope="col">Alamat</th>
      <th scope="col">Instalasi</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="show-anggota"> </tbody>
  </table>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
      $.ajax({
        url : "<?= base_url('superadmin/Daftar_anggota/getJoinKar') ?>",
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
                        '<td>'+ msg[i].npk +'</td>'+
                        '<td>'+ msg[i].nama +'</td>'+
                        '<td>'+ msg[i].no_telp +'</td>'+
                        '<td>'+ msg[i].tempat_tugas +'</td>'+
                        '<td>'+ msg[i].start +'</td>'+
                        '<td>'+ msg[i].end_date +'</td>'+
                        '<td><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal'+ msg[i].id +'" >View</button></td>'+
                        '</tr>';
                j++ ;
            }
           // $("#show-anggota").html(html);
           console.log(html)

        }
      })
  })
</script>

<?php /*
<!-- Modal tracking history pkwt dan kelengkapan berkas -->
<?php foreach($data as $row) : ?>
<div class="modal fade" id="exampleModal<?= $row->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
  <div class="modal-dialog modal-xl" role="document">
    <div class="load" style="position: absolute;z-index: 9;display: flex;margin : 150px 200px;">
      <img id="loading" style="display: none;" src="<?= base_url('assets/img/load.gif') ?>" >
    </div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row col-lg-12">
                <!-- pkwt tracking -->
                <div class="col-md-8">
                  <div id="tracking-pre"></div>
                     <div id="tracking">
                        <div class="text-center tracking-status-intransit">
                           <p class="tracking-status text-tight">tracking history PKWT Anggota</p>
                        </div>
                        <div class="tracking-list">
                          <?php $tracking = $this->db->get_where("history_pkwt", array('id_karyawan' => $row->id_karyawan));
                            foreach($tracking->result() as $track) :
                           ?>
                           <div class="tracking-item">
                              <div class="tracking-icon status-intransit">
                                 <svg class="svg-inline--fa fa-circle fa-w-16"  data-prefix="fas" data-icon="circle" role="img">
                                 </svg>
                              </div>
                              <div class="tracking-date"><?=  $track->tgl ?> </div>
                              <div class="tracking-content" style="position: relative;z-index: 9999"><u class="text-primary"><a href="javascript:file<?= $row->id_karyawan ?>('<?= $track->file_pkwt ?>')"><?= $track->pkwt . '/' . $track->npk_br?></u></a> </div>
                           </div> 

                           <script type="text/javascript">
                             function file<?= $row->id_karyawan ?>(file){
                                window.open("<?= base_url("assets/upload/backup_pkwt/") ?>"+file,"height=450","width=450","menubar=yes","resizeable=yes");
                             }
                           </script>
                         <?php endforeach ?>
                      </div>
                          </div>
                      </div>
                  <!-- end of tracking pkwt  -->



                  <div class="col-md-4">
                  <!-- traking file kelengkapan berkas -->
                  <div id="tracking-pre"></div>
                     <div id="tracking">
                        <div class="text-center tracking-status-intransit">
                           <p class="tracking-status text-tight">Kelengkapan berkas Anggota</p>
                        </div>
                        <div class="tracking-list">
     
                           <div class="tracking-item">
                              <div class="tracking-date">KTP </div>
                                <div class="tracking-content" style="position: relative;z-index: 9999">
                              <?php if(!empty($row->file_ktp) ) { ?>
                                    <a href="javascript:ktp<?= $row->id ?>()" class="btn btn-success  btn-sm mb-1" >
                                      Data Lengkap
                                    </a>
                                     <script type="text/javascript">
                                      //open file ktp
                                        function ktp<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/KTP/' . $row->file_ktp) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                              <?php } else { ?>
                                    <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                              <?php } ?>
                                </div>
                             

                              <div class="tracking-date">Buku Rekening </div>
                              <div class="tracking-content" style="position: relative;z-index: 9999">
                                <?php if(!empty($row->buku_rekening)){ ?>
                                  <a href="javascript:rekening<?= $row->id ?>()" class="btn btn-success  btn-sm mb-1" >
                                      Data Lengkap
                                    </a>
                                  <script type="text/javascript">
                                      //open rekening
                                        function rekening<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/Rekening/' . $row->buku_rekening) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                                <?php }else { ?>
                                  <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                               <?php } ?>
                              </div>

                              <div class="tracking-date">Surat Lamaran</div>
                              <div class="tracking-content" style="position: relative;z-index: 9999">
                                <?php if(!empty($row->surat_lamaran)){ ?>
                                  <a href="javascript:lamaran<?= $row->id ?>()" class="btn btn-success  btn-sm mb-1" >
                                      Data Lengkap
                                    </a>
                                  <script type="text/javascript">
                                      //open lamaran
                                        function lamaran<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/Surat Lamaran/' . $row->surat_lamaran) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                                <?php }else { ?>
                                  <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                               <?php } ?>
                              </div>

                              <div class="tracking-date">Riwayat Hidup</div>
                              <div class="tracking-content" style="position: relative;z-index: 9999">
                                <?php if(!empty($row->daftar_riwayat_hidup)){ ?>
                                  <a href="javascript:Riwayat<?= $row->id ?>()" class="btn btn-success  btn-sm mb-1" >
                                      Data Lengkap
                                    </a>
                                  <script type="text/javascript">
                                      //open Riwayat
                                        function Riwayat<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/Riwayat Hidup/' . $row->daftar_riwayat_hidup) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                                <?php }else { ?>
                                 <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                               <?php } ?>
                              </div>

                              <div class="tracking-date">Pendidikan </div>
                              <div class="tracking-content" style="position: relative;z-index: 9999">
                                <?php if(!empty($row->file_pendidikan)){ ?>
                                  <a href="javascript:ijazah<?= $row->id ?>()" class="btn btn-success btn-sm mb-1" >
                                      Data Lengkap
                                    </a>
                                  <script type="text/javascript">
                                      //open Riwayat
                                        function ijazah<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/Ijazah/' . $row->file_pendidikan) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                                <?php }else { ?>
                                  <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                               <?php } ?>
                              </div>

                              <div class="tracking-date">Surat Sehat </div>
                              <div class="tracking-content" style="position: relative;z-index: 9999">
                                <?php if(!empty($row->surat_sehat)){ ?>
                                  <a href="javascript:surat_sehat<?= $row->id ?>()" class="btn btn-success  btn-sm mb-1" >
                                      Data Lengkap
                                    </a>
                                    <script type="text/javascript">
                                      //open Riwayat
                                        function surat_sehat<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/Surat Sehat/' . $row->surat_sehat) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                                <?php }else { ?>
                                  <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                               <?php } ?>
                              </div>

                              <div class="tracking-date">Surat Referensi </div>
                              <div class="tracking-content" style="position: relative;z-index: 9999">
                                <?php if(!empty($row->surat_referensi)){ ?>
                                  <a href="javascript:surat_referensi<?= $row->id ?>()" class="btn btn-success  btn-sm mb-1" >
                                      Data Lengkap
                                    <script type="text/javascript">
                                      //open Riwayat
                                        function surat_referensi<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/Surat Referensi/' . $row->surat_referensi) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                                  </a>
                                <?php }else { ?>
                                <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                               <?php } ?>
                              </div>

                              <div class="tracking-date">Domisili </div>
                              <div class="tracking-content" style="position: relative;z-index: 9999">
                                <?php if(!empty($row->surat_domisili)){ ?>
                                  <a href="javascript:surat_domisili<?= $row->id ?>()" class="btn btn-success  btn-sm mb-1" >
                                      Data Lengkap
                                    </a>
                                  <script type="text/javascript">
                                      //open Riwayat
                                        function surat_domisili<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/Domisili/' . $row->surat_domisili ) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                                <?php }else { ?>
                                  <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                               <?php } ?>
                              </div>

                              <div class="tracking-date">SKCK</div>
                              <div class="tracking-content" style="position: relative;z-index: 9999">
                                <?php if(!empty($row->skck)){ ?>
                                  <a href="javascript:skck<?= $row->id ?>()" class="btn btn-success  btn-sm mb-1" >
                                      Data Lengkap
                                    </a>
                                    <script type="text/javascript">
                                      //open Riwayat
                                        function skck<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/SKCK/' . $row->skck) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                                <?php }else { ?>
                                 <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                               <?php } ?>
                              </div>

                              <div class="tracking-date">Kartu Keluarga </div>
                              <div class="tracking-content" style="position: relative;z-index: 9999">
                                <?php if(!empty($row->file_kk)){ ?>
                                  <a href="javascript:file_kk<?= $row->id ?>()" class="btn btn-success  btn-sm mb-1" >
                                      Data Lengkap
                                    </a>
                                    <script type="text/javascript">
                                      //open Riwayat
                                        function file_kk<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/Kartu Keluarga/' . $row->file_kk) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                                <?php }else { ?>
                                  <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                               <?php } ?>
                              </div>

                              <div class="tracking-date">NPWP </div>
                              <div class="tracking-content" style="position: relative;z-index: 9999">
                                <?php if(!empty($row->file_npwp)){ ?>
                                  <a href="javascript:npwp<?= $row->id ?>()" class="btn btn-success  btn-sm mb-1" >
                                      Data Lengkap
                                    </a>
                                    <script type="text/javascript">
                                      //open Riwayat
                                        function npwp<?= $row->id ?>(){
                                            window.open("<?= base_url('assets/upload/berkas/NPWP/' . $row->file_npwp) ?>","height=650","width=700","menubar=yes","resizeable=yes");
                                        }
                                    </script>
                                <?php }else { ?>
                                  <a  class="btn btn-warning text-white  btn-sm mb-1" >
                                      Belum lengkap
                                    </a>
                               <?php } ?>
                              </div>

                           </div> 
                        </div>
                          </div>
                      </div>
                      <!-- end of tracking kelengkapan berkas  -->

                  </div>


          </div>
      </div>

      </div>
    </div>

<?php endforeach ?>
<!-- end of modal -->

*/ ?>