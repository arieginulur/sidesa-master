<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SIDESA</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/login/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/login/login.css">
    
</head>
<body>
    <div class="container h-100">
		<div class="row h-100 justify-content-center align-item-center ">
			<div class="col-lg-3 bg-utama col-md-7 col-sm-12 card-none-color shadow-lg p-lg-4 p-md-4 p-sm-3 mx-3 mt-3 mb-3 align-self-center">
				<img src="img/logo_dkamasan.png" class="img-fluid pt-3" width="100px" alt="Logo">&nbsp;
				<h3 class="card-title mt-2 text-white">Pendataan Desa Kamasan</h3>
				<p class="text-white">Merupakan pendataan administratif penduduk Desa Kamasan.</p>
			</div>
			<?php  
				if(!isset($_GET["change"])){
			?>
			<div class="col-lg-5 col-md-7 col-sm-12 card-none-color shadow-lg p-lg-4 p-md-4 p-sm-3 mx-3 mb-3 align-self-center">
				<h3 class="card-title mt-2">Masuk</h3>
				<p>Silahkan masukkan NIK (Nomor Induk keluarga) dan Kata Sandi Anda untuk melanjutkan
					ke Aplikasi.</p>
				<form action="validasi" class="mb-3 mt-md-3" method="post">
					<div class="form-group small">
						<label class="font-weight-bold text-secondary">NIK</label>
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text no-bg"><i class="fas fa-id-card text-secondary"></i></span>
							</div>
							<input name="nik" class="form-control" tabindex="1" placeholder="Nomor Induk keluarga" type="text" value="" autocomplete="off">
						</div>
					</div>
					<div class="form-group small">
						<label class="font-weight-bold text-secondary">Kata Sandi</label>
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend border-right-0">
								<span class="input-group-text no-bg border-right-0"><i class="fas fa-key text-secondary"></i></span>
							</div>
							<input id="password" name="password" class="form-control boder-left-0" tabindex="2" placeholder="Kata sandi" type="password" value="" autocomplete="off">
							<i class="password-icon fas fa-eye warna-utama" type="toggle" onclick="myFunction()"></i>
						</div>
						<p href="" class="text-right mt-2">
							<a href="mikir_keneh" class="warna-utama ">Lupa kata sandi?</a>
						</p>
					</div>
					<button type="submit" name="login_warga" class="btn btn-success btn-block">MASUK</button>
                    <?php if(isset($_GET["error"])){?>
                        <center><p style="color: red; font-style:italic">NIK atau Password Salah</p></center>
                    <?php } else if(isset($_GET["error1"])){ echo '<center><p style="color: red; font-style:italic">Harap memasukkan NIK dan Password dengan benar</p></center>'; }?>
				</form>
				<p class="text-center small">SILAKAN DATANG ATAU HUBUNGI OPERATOR DESA UNTUK MENDAPATKAN AKUN ANDA.</p>
			</div>
			<?php } else {
					session_start();
					$id_keluarga = $_SESSION["id_keluarga"];
				?>
				<div class="col-lg-5 col-md-7 col-sm-12 card-none-color shadow-lg p-lg-4 p-md-4 p-sm-3 mx-3 mb-3 align-self-center">
				<h3 class="card-title mt-2">Ganti Password</h3>
				<p>Harap mengganti password.</p>
				<form action="change_pass" class="mb-3 mt-md-3" method="post">
					<div class="form-group small">
						<label class="font-weight-bold text-secondary">Ganti Password Baru</label>
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend border-right-0">
								<span class="input-group-text no-bg border-right-0"><i class="fas fa-key text-secondary"></i></span>
							</div>
							<input id="pass1" name="pass1" class="form-control boder-left-0" tabindex="2" placeholder="Ganti Password Baru" type="password" value="" autocomplete="off">
							<i class="password-icon fas fa-eye warna-utama" type="toggle" onclick="myFunctiona()"></i>
						</div>	
					</div>
					<div class="form-group small">
						<label class="font-weight-bold text-secondary">Ulangi Password Baru</label>
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend border-right-0">
								<span class="input-group-text no-bg border-right-0"><i class="fas fa-key text-secondary"></i></span>
							</div>
							<input id="pass2" name="pass2" class="form-control boder-left-0" tabindex="2" placeholder="Ulangi Password Baru" type="password" value="" autocomplete="off">
							<i class="password-icon fas fa-eye warna-utama" type="toggle" onclick="myFunctionb()"></i>
						</div>
					</div>
					<input type="hidden" name="id_keluarga" value="<?php echo $id_keluarga ?>">
					<button type="submit" name="change_pass" class="btn btn-success btn-block">SIMPAN</button>
                    <?php if(isset($_GET["err"])){?>
                        <center><p style="color: red; font-style:italic">Password tidak sama</p></center>
                    <?php } ?>
				</form>
			</div>
			<?php }?>
		</div>
	</div>
    <script>
		function myFunction() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
		function myFunctiona() {
			var x = document.getElementById("pass1");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "pass1";
			}
		}
		function myFunctionb() {
			var x = document.getElementById("pass2");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "pass2";
			}
		}
	</script>
</body>
</html>