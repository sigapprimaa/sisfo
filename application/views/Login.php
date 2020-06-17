


<!DOCTYPE html>
<html lang="en">
<head>
<title>SISFO | SIGAP PRIMA ASTREA</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="../assets/img/icons/favicon.ico">

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/animate/animate.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/util.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/main.css">
<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/') ?>img/sigap.icon">
<script type="text/javascript" src="<?= base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url('assets/vendor/') ?>jquery/jquery-3.2.1.min.js" type="text/javascript"></script>

</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/security1.png');">
			<div class="wrap-login100">
				<form method="post" onsubmit="return validasi()" action="<?= base_url('Login/cekLogin') ?>" class="login100-form validate-form">
					<div class="login100-form-avatar">
						<img src="<?= base_url() ?>assets/img/sigap.icon" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						MASTER DATA <br> SIGAP PRIMA ASTREA
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" name="npk"  autocomplete="off" placeholder="Enter NPK" id="npk">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password"  placeholder="Enter Password"  name="pass" id="pass">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
							Forgot Username / Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript">
	function validasi()
	{
		var npk  = document.getElementById('npk').value ;
		var pass = document.getElementById('pass').value;

			if(npk == ""){
				swal({
					icon : "warning",
					title : "Perhatian",
					text : "npk belum di isi",
					dangerMode : [true,"Ok"]
				}).then(function(){
						$("#npk").focus();
						return ;
				})
				return false ;
			}

			if(pass == ""){
				swal({
					icon : "warning",
					title : "Perhatian",
					text : "password belum di isi",
					dangerMode : [true,"Ok"]
				}).then(function(){
					$("#pass").focus();
				})
					return false ;
			}

		return ;
	}

</script>
<?php if($this->session->flashdata('npk')){ ?>
	<script type="text/javascript">
		swal({
			icon : "error",
			title : "Perhatian",
			text : "NPK tidak terdaftar",
			dangerMode : [true , "Ok"]
		})
	</script>
<?php }else if($this->session->flashdata('pass')) {?>
	<script type="text/javascript">
		swal({
			icon : "error",
			title : "Perhatian",
			text : "Password Salah",
			dangerMode : [true , "Ok"]
		})
	</script>
<?php }else if($this->session->flashdata('empty')) { ?>
	<script type="text/javascript">
		swal({
			icon : "error",
			title : "Perhatian",
			text : "akun tidak ada",
			dangerMode : [true , "Ok"]
		})
	</script>
<?php } ?>



<?php if($this->session->flashdata('logout')){ ?>
	<script type="text/javascript">
		swal({
			icon : "error",
			title : "Perhatian",
			text : "Sessi Anda Berakhir",
			dangerMode : [true , "Ok"]
		})
	</script>
<?php } ?>



<script src="<?= base_url('assets/') ?>bootstrap/js/popper.js" type="97cf60032edec61c6592e30b-text/javascript"></script>
<script src="<?= base_url('assets/') ?>bootstrap/js/bootstrap.min.js" type="97cf60032edec61c6592e30b-text/javascript"></script>

<script src="<?= base_url('assets/') ?>select2/select2.min.js" type="97cf60032edec61c6592e30b-text/javascript"></script>

<script src="<?= base_url('assets/') ?>js/main.js" type="97cf60032edec61c6592e30b-text/javascript"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="97cf60032edec61c6592e30b-text/javascript"></script>
<script type="97cf60032edec61c6592e30b-text/javascript">
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="97cf60032edec61c6592e30b-|49" defer=""></script></body>
</html>
