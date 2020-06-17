
<?php if($keyword == 1){ ?>
 			<div class="card">
 				<div class="card-body">
 					<form  id="form" method="post" enctype="multipart/form-data">
 						<label>Upload File KTP Anda	</label>
 						<input type="hidden" name="direktory" value="KTP">
 						<input type="hidden" name="nama_colom" value="file_ktp">
 						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
 						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<input type="submit" name="upload" class="btn btn-primary btn-sm mt-2" value="Upload KTP">
 					</form>
 				</div>
 				<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 			</div>
 	<?php	}elseif($keyword == 2) { ?>
 			<div class="card">
 				<div class="card-body">
 					<form  method="post" enctype="multipart/form-data">
 						<label>Upload Buku Rekening Anda	</label>
 						<input type="hidden" name="direktory" value="Rekening">
 						<input type="hidden" name="nama_colom" value="buku_rekening">
 						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
 						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload Rekening</button>
 					</form>
 				</div>
 				<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 			</div>
 	<?php } elseif($keyword == 3) { ?>
 			<div class="card">
 				<div class="card-body">
 					<form  method="post" enctype="multipart/form-data">
 						<label>Upload Surat Lamaran Anda	</label>
 						<input type="hidden" name="direktory" value="Surat Lamaran">
 						<input type="hidden" name="nama_colom" value="surat_lamaran">
 						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
 						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload Lamaran</button>
 					</form>
 				<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 				</div>
 			</div>
 	<?php } elseif($keyword == 4) { ?>
 			<div class="card">
 				<div class="card-body">
 					<form  method="post" enctype="multipart/form-data">
						<label>Upload Riwayat Hidup Anda	</label>
						<input type="hidden" name="direktory" value="Riwayat Hidup">
						<input type="hidden" name="nama_colom" value="daftar_riwayat_hidup">
						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload Riwayat Hidup</button>
 					</form>
 			<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 				</div>
 			</div>
 	<?php } elseif($keyword == 5) { ?>
 			<div class="card">
 				<div class="card-body">
 					<form  method="post" enctype="multipart/form-data">
 						<label>Upload Ijazah Anda	</label>
 						<input type="hidden" name="direktory" value="Ijazah">
						<input type="hidden" name="nama_colom" value="file_pendidikan">
						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload Ijazah</button>
 					</form>
 				</div>
 				<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 			</div>
 	<?php } elseif($keyword == 6) { ?>
 			<div class="card">
 				<div class="card-body">
 					<form  method="post" enctype="multipart/form-data">
 						<label>Upload Surat Sehat</label>
 						<input type="hidden" name="direktory" value="Surat Sehat">
						<input type="hidden" name="nama_colom" value="surat_sehat">
						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload Surat Sehat</button>
 					</form>
 				</div>
 			<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 			</div>
 	<?php } elseif($keyword == 7) { ?>
 			<div class="card">
 				<div class="card-body">
 					<form  method="post" enctype="multipart/form-data">
 						<label>Upload Surat Referensi</label>
 						<input type="hidden" name="direktory" value="Surat Referensi">
						<input type="hidden" name="nama_colom" value="surat_referensi">
						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload Surat Referensi</button>
 					</form>
 				</div>
 			<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 			</div>
 	<?php } elseif($keyword == 8) { ?>
 			<div class="card">
 				<div class="card-body">
 					<form  method="post" enctype="multipart/form-data">
 						<label>Upload Surat Domisili</label>
 						<input type="hidden" name="direktory" value="Domisili">
						<input type="hidden" name="nama_colom" value="surat_domisili">
						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload Surat Domisili</button>
 					</form>
 				</div>
 			<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 			</div>
 	<?php } elseif($keyword == 9) { ?>
 			<div class="card">
 				<div class="card-body">
 					<form  method="post" enctype="multipart/form-data">
 						<label>Upload SKCK</label>
 						<input type="hidden" name="direktory" value="SKCK">
						<input type="hidden" name="nama_colom" value="skck">
						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload SKCK</button>
 					</form>
 				</div>
 			<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 			</div>
 	<?php } elseif($keyword == 10) { ?>
 			<div class="card">
 				<div class="card-body">
 					<form  method="post" enctype="multipart/form-data">
 						<label>Upload Kartu Keluarga</label>
 						<input type="hidden" name="direktory" value="Kartu Keluarga">
						<input type="hidden" name="nama_colom" value="file_kk">
						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload Kartu Keluarga</button>
 					</form>
 				</div>
 			<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 			</div>
 	<?php } elseif($keyword == 11) { ?>
 			<div class="card">
 				<div class="card-body">
 					<form  method="post" enctype="multipart/form-data">
 						<label>Upload NPWP</label>
 						<input type="hidden" name="direktory" value="NPWP">
						<input type="hidden" name="nama_colom" value="file_npwp">
						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
 					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload NPWP</button>
 					</form>
 				</div>
 			<script type="text/javascript">
				  $(document).ready(function(){
				      $("form").on('submit',function(event){
				          event.preventDefault();
				          	var file = document.getElementById('file').value ;
				          	if(file == ""){
				          		swal({
				          			icon : "error",
				          			title : "Warning",
				          			text : "tidak ada file yang di upload",
				          			dangerMode : [true,"Ok"]
				          		});
				          		return false ;
				          	}else {
				          		$.ajax({
				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
				          			method : "POST",
				          			data : new FormData(this),
				          			contentType : false ,
				          			processData : false ,
				          			cache : false ,
				          			beforeSend : function(){
				          				$("#loading").show();
				          			},
				          			complete : function(){
				          				$("#loading").hide();
				          			},
				          			success : function(msg){
				          				swal({
				          					icon : "success",
				          					title : "Upload Sukes"
				          				}).then(function(){
				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
				          				})
				          			}
				          		})
				          	}
				      })
				  })
				</script>
 			</div>
    <?php } elseif($keyword == 12) { ?>
   			<div class="card">
   				<div class="card-body">
   					<form  method="post" enctype="multipart/form-data">
   						<label>Upload KTA</label>
   						<input type="hidden" name="direktory" value="KTA">
  						<input type="hidden" name="nama_colom" value="file_kta">
  						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
  						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
   					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload KTA</button>
   					</form>
   				</div>
   			<script type="text/javascript">
  				  $(document).ready(function(){
  				      $("form").on('submit',function(event){
  				          event.preventDefault();
  				          	var file = document.getElementById('file').value ;
  				          	if(file == ""){
  				          		swal({
  				          			icon : "error",
  				          			title : "Warning",
  				          			text : "tidak ada file yang di upload",
  				          			dangerMode : [true,"Ok"]
  				          		});
  				          		return false ;
  				          	}else {
  				          		$.ajax({
  				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
  				          			method : "POST",
  				          			data : new FormData(this),
  				          			contentType : false ,
  				          			processData : false ,
  				          			cache : false ,
  				          			beforeSend : function(){
  				          				$("#loading").show();
  				          			},
  				          			complete : function(){
  				          				$("#loading").hide();
  				          			},
  				          			success : function(msg){
  				          				swal({
  				          					icon : "success",
  				          					title : "Upload Sukes"
  				          				}).then(function(){
  				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
  				          				})
  				          			}
  				          		})
  				          	}
  				      })
  				  })
  				</script>
   			</div>
      <?php } elseif($keyword == 13) { ?>
     			<div class="card">
     				<div class="card-body">
     					<form  method="post" enctype="multipart/form-data">
     						<label>Upload Ijazah Gada Pratama</label>
     						<input type="hidden" name="direktory" value="GadaPratama">
    						<input type="hidden" name="nama_colom" value="gadapratama">
    						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
    						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
     					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload Ijazah Gada Pratama</button>
     					</form>
     				</div>
     			<script type="text/javascript">
    				  $(document).ready(function(){
    				      $("form").on('submit',function(event){
    				          event.preventDefault();
    				          	var file = document.getElementById('file').value ;
    				          	if(file == ""){
    				          		swal({
    				          			icon : "error",
    				          			title : "Warning",
    				          			text : "tidak ada file yang di upload",
    				          			dangerMode : [true,"Ok"]
    				          		});
    				          		return false ;
    				          	}else {
    				          		$.ajax({
    				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
    				          			method : "POST",
    				          			data : new FormData(this),
    				          			contentType : false ,
    				          			processData : false ,
    				          			cache : false ,
    				          			beforeSend : function(){
    				          				$("#loading").show();
    				          			},
    				          			complete : function(){
    				          				$("#loading").hide();
    				          			},
    				          			success : function(msg){
    				          				swal({
    				          					icon : "success",
    				          					title : "Upload Sukes"
    				          				}).then(function(){
    				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
    				          				})
    				          			}
    				          		})
    				          	}
    				      })
    				  })
    				</script>
     			</div>
        <?php } elseif($keyword == 14) { ?>
       			<div class="card">
       				<div class="card-body">
       					<form  method="post" enctype="multipart/form-data">
       						<label>Upload Ijazah Gada Madya</label>
       						<input type="hidden" name="direktory" value="GadaMadya">
      						<input type="hidden" name="nama_colom" value="gadamadya">
      						<input type="hidden" name="npk" value="<?= $this->session->userdata('npk') ?>">
      						<input type="file" onchange="return validasi()" id="file" name="file" class="form-control">
       					<button type="submit" name="upload" class="btn btn-primary btn-sm mt-2">Upload Ijazah Gada Madya</button>
       					</form>
       				</div>
       			<script type="text/javascript">
      				  $(document).ready(function(){
      				      $("form").on('submit',function(event){
      				          event.preventDefault();
      				          	var file = document.getElementById('file').value ;
      				          	if(file == ""){
      				          		swal({
      				          			icon : "error",
      				          			title : "Warning",
      				          			text : "tidak ada file yang di upload",
      				          			dangerMode : [true,"Ok"]
      				          		});
      				          		return false ;
      				          	}else {
      				          		$.ajax({
      				          			url : "<?= base_url("user/UploadBerkas/upload") ?>",
      				          			method : "POST",
      				          			data : new FormData(this),
      				          			contentType : false ,
      				          			processData : false ,
      				          			cache : false ,
      				          			beforeSend : function(){
      				          				$("#loading").show();
      				          			},
      				          			complete : function(){
      				          				$("#loading").hide();
      				          			},
      				          			success : function(msg){
      				          				swal({
      				          					icon : "success",
      				          					title : "Upload Sukes"
      				          				}).then(function(){
      				          					window.location.href="<?= base_url("user/UploadBerkas/index") ?>"
      				          				})
      				          			}
      				          		})
      				          	}
      				      })
      				  })
      				</script>
       			</div>
 	<?php }
