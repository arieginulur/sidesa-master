<?php
require 'function.php';
if (isset ($_POST["register"])) {
    if ( registrasi($_POST) > 0) {
        echo "<script>
                 alert('User Baru Berhasil Ditambahkan!');   
              </script>";
    } else {
        echo mysqli_error($conn);
    }
    
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/registrasi.css">

<!-- My Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Display&display=swap" rel="stylesheet">

    <title>Website Desa Kamasan</title>
  </head>
  <body>
    <!-- awal nav -->
 
</div>
    <nav class="navbar navbar-expand-lg navbar-primary bg-light ">
    <img class="logo" src="img/logo.png" alt="">
  <div class="container">
    <a class="navbar-brand" href="index.php">WEBSITE DESA KAMASAN <br> <h6>KEC. BANJARAN KAB. BANDUNG</h6></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Informasi</a>
        </li>
        <li class="nav-item">
          <a class="login btn btn-primary" href="#">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- akhir nav -->
<!-- Registrasi -->
<div class="container">
  <div class="row">
    <div class="col">
    <h3>REGISTRASI</h3>
<div class="card text-dark bg-light  " style="max-width: 22rem;">
<form action="" method="POST">
    
    <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" autocomplete="off"> 
    </div>
    
    <div class="mb-3">
        <label for="no_kk" class="form-label">No. KK </label>
        <input type="text" class="form-control" name="no_kk" autocomplete="off">  
    </div>
  
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password </label>
        <input type="password" class="form-control" name="password" autocomplete="off">
    </div> 
    
    <div class="mb-3">
        <label for="exampleInputPassword2" class="form-label">Konfirmasi Password </label>
        <input type="password" class="form-control" name="password2" autocomplete="off">
    </div>  
        

    
  <button type="submit"  name="register" class="btn btn-success " id="login">Submit</button>
  </div>
  <center><p class="lgn">Sudah Punya Akun? Login<a href="login.php" >Disini</p></a></center>
</form>
</div>
  
</div>
</div>
</div>


<!-- Akhir Registrasi -->

<!-- footer -->
<footer class="footer " id="scrollspyfindus" >
<div class="container">
  <div class=" row">
    <div class="col-lg-4">
      <div class="embed-responsive embed-responsive-16by9 ">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.6745089665624!2d107.5804837147736!3d-7.047481794909808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68eb847b7e824b%3A0xd4b3c5a61e5fb94b!2sKantor%20Kepala%20Desa%20Kamasan!5e0!3m2!1sid!2sid!4v1624640701650!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

    </div>
    <div class="col-md-4">
    <h5 class="tengahatas">ALAMAT</h5>
            <p class="tengahatas">KANTOR DESA KAMASAN<BR>
            Jl. Raya Banjaran - Arjasari No.220, Kamasan, Kec. Banjaran, Bandung, Jawa Barat 40377
            </p>
            <h5 class="tengahbawah">HUBUNGI KAMI</h5>
            <ul class="tengahbawah2">
                <li>022-1234567</li>
                <li>desakamasan@gmail.com</li>
            </ul>
    </div>

   <div class="col-md-4">
     <h5>LAYANAN PELANGGAN</h5>
     <ul>
                <li>Pembuatan KTP, Kartu Keluarga</li>
                <li>Pendataan Penduduk</li>
                <li>Pelayanan</li>
                <li>Pengiriman</li>
      </ul>
   

     <h5 class="jasa">JASA PENGIRIMAN</h5>
     <img class="kurir" src="img/JNT.png">
     <img class="kurir" src="img/jne.png">
     <img class="kurir" src="img/pos.png">
     <br>
     <img class="kurir2" src="img/grab.png">
     <img class="kurir3" src="img/gojek.png">


     

   </div>    
  </div>

  

</div>

</footer>
<div class="copy "  >
    <p class="copyright"> <i class="fa fa-copyright" aria-hidden="true"></i>2021 <span> Desa Kamasan </span>. All Rights Reserved.</p>
</div>
<!-- akhir footer -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>