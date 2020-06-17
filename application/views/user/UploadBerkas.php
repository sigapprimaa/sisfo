<!-- Begin Page Content -->
     <div class="container-fluid">

       <!-- Page Heading -->
      <div class="card">
      	<div class="card-body">
      		<h4>Pilih File yang ingin di upload </h4>
          <div class="btn-group ">
            <button type="button" class="col-lg-12 btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Select Nama File Upload
            </button>
            <div class="dropdown-menu">
              <li value="1" class="dropdown-item" href="#">KTP</li>
              <li value="2"  class="dropdown-item" href="#">Buku Rekening</li>
              <li value="3"  class="dropdown-item" href="#">Surat Lamaran</li>
              <li value="4"  class="dropdown-item" href="#">Daftar Riwayat Hidup</li>
              <li value="5"  class="dropdown-item" href="#">Ijazah</li>
              <li value="6"  class="dropdown-item" href="#">Surat Sehat</li>
              <li value="7"  class="dropdown-item" href="#">Surat Referensi</li>
              <li value="8"  class="dropdown-item" href="#">Surat Domisili</li>
              <li value="9"  class="dropdown-item" href="#">SKCK</li>
              <li value="10"  class="dropdown-item" href="#">Kartu Keluarga</li>
              <li value="11"  class="dropdown-item" href="#">NPWP</li>
              <li value="12"  class="dropdown-item" href="#">KTA</li>
              <li value="13"  class="dropdown-item" href="#">Ijazah Gada Pratama</li>
              <li value="14"  class="dropdown-item" href="#">Ijazah Gada MAdya</li>
            </div>
          </div>
      	</div>
      </div>
      <hr>
      <div class="load" style="position: absolute;z-index: 9;display: flex;margin : -90px 250px;">
      <img id="loading" style="display: none;" src="<?= base_url('assets/img/load.gif') ?>" >
    </div>
      <div id="tampil-form"></div>

<script type="text/javascript">
	$(document).ready(function(){
		$("li").click(function(){
    	var keyword = $(this).val();
			if(keyword == ""){
				$("#tampil-form").html("");
			}else {
				$.ajax({
					url : "<?= base_url('user/UploadBerkas/loadForm') ?>",
					method : "GET" ,
          contentType : false ,
					data : 'pilih='+keyword,
					success : function(response){
						$("#tampil-form").html(response);
					}
				})
			}

      //$("#tampil-form").html(keyword);

		})
	})
</script>

<script type="text/javascript">
  function validasi(){
    var file = document.getElementById('file');
    var path = file.value ;
    var exe = /(\.jpg|\.png|\.jpeg|\.pdf)$/i;
      if(!exe.exec(path)){
        swal({
          icon : "error",
          dangerMode : [true,"Ok"],
          title : "File di Tolak"
        })
        file.value = "";
        return false ;
      }
  }
</script>

     </div>
     <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->
