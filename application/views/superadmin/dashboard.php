 <!-- Begin Page Content -->
<div class="container-fluid"   >

  <!-- Content Row -->
 <div class="alert alert-success" role="alert">
      <i class="fas fa-fw fa-home "></i><?php hari() ; echo date('d M Y , '); ?>
      <span id="output"></span>        
    </div>
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Selamat Datang <?= $data->nama ?>!</h4>
      <!-- Tambahkan Session login nama, dan level  -->
      <p>Sistem Informasi Master Data SIGAP PRIMA ASTREA. Anda Login  Sebagai <?php echo $this->session->role_id == 3 ?  "Anggota" : "Superadmin" ; ?></p>
  </div>


          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Status Anggota Kontrak</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countKontrak ?> anggota</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Status Anggota Permanen</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countPermanen ?> anggota</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Seluruh Anggota</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countAll ?> anggota</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengunjung Hari ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $log_user ?> Akun</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </div>

           <div class="card">
           <div class="card-body">
            <div class="car-header">
              <label class="text-primary">Log Aktivitas User</label>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th>NPK</th>
                    <th>Login</th>
                    <th>Logout</th>
                    <th>Tanggal</th>
                </tr>
                <tbody>
                  <?php foreach($log_user_login as $log) : ?>
                    <tr>
                      <td><?= $log->id_karyawan ?></td>
                      <td><?= $log->login ?></td>
                      <td><?= $log->logout ?></td>
                      <td><?= $log->tanggal ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              
            </table>
           </div>

         </div>
</div>


      <?php
        date_default_timezone_set('Asia/Jakarta');
        function hari(){
         $hari = date('D');
            switch ($hari) {
              case 'Sun':
               echo  "Minggu ";
                break;
              case 'Mon':
               echo  "Senin ";
                break;
              case 'Tue':
               echo  "Selasa ";
                break;
              case 'Wed':
               echo  "Rabu ";
                break;
              case 'Thu':
               echo  "Kamis ";
                break;
              case 'Thu':
               echo  "Jum'at ";
                break;
                case 'Sat':
               echo  "Sabut ";
                break;
              
              default:
                # code...
                break;
            }
        }
        ?>
