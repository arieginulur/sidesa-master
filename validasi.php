<?php
session_start();
require 'function.php';
if( isset($_POST["login_admin"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result_admin = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  // cek Username
  if( mysqli_num_rows($result_admin) === 1 ) {
    // cek Password
    $row = mysqli_fetch_assoc($result_admin);
    if( password_verify($password, $row["password"]) ){
      $_SESSION["username"] = $row["username"];
      $_SESSION["password"] = $row["password"];
      $_SESSION["nama_lengkap"] = $row["nama"];
      $_SESSION["level"] = $row["level"];
      $_SESSION["Login"] = true;
      if($_SESSION["level"] == "admin"){
        header("Location: admin/index");
        exit;
      } else if($_SESSION["level"] == "operator"){
        header("Location: admin/index");
        exit;
      } else {
        header("Location: panel_admin");
        exit;
      }
    } else {
    header("Location: login.php?error");
      exit;
    }
  }
} else if(isset($_POST["login_warga"])){
  $nik = $_POST["nik"];
  $pass = $_POST["password"];
  $result_warga = mysqli_query($conn, "SELECT tbl_keluarga.id_keluarga, tbl_keluarga.id_penduduk, tbl_penduduk.nik, tbl_penduduk.nama, tbl_keluarga.password,
  tbl_keluarga.is_pendataan, tbl_keluarga.is_login 
  FROM tbl_keluarga LEFT JOIN tbl_penduduk ON tbl_keluarga.id_penduduk = tbl_penduduk.id_penduduk
  WHERE tbl_penduduk.nik = '$nik' AND tbl_keluarga.is_active = 1");
  // Cek NIK Kepala Keluarga
  if(mysqli_num_rows($result_warga) === 1){
    //Cek Password
    $rowa = mysqli_fetch_assoc($result_warga);
    if(password_verify($pass,$rowa["password"])){
      $_SESSION["nik"] = $rowa["nik"];
      $_SESSION["password"] = $rowa["password"];
      $_SESSION["nama"] = $rowa["nama"];
      $_SESSION["id_keluarga"] = $rowa["id_keluarga"];
      $_SESSION["id_penduduk"] = $rowa["id_penduduk"];
      $_SESSION["is_pendataan"] = $rowa["is_pendataan"];
      $_SESSION["is_login"] = $rowa["is_login"];
      $_SESSION["Login"] = true;
      $log = date("Y-m-d H:i:m");
      $idkeluarga = $rowa["id_keluarga"];
      // Update last login
      $loggedin = mysqli_query($conn, "SELECT tbl_keluarga SET last_login = '$log' WHERE id_keluarga = $idkeluarga");
      if($_SESSION["is_login"] == 0){
        header("Location: panel_login?change");
        exit;
      } else if($_SESSION["is_pendataan"] == 0){
        header("Location: penduduk/pendataan");
        exit;
      } else {
        header("Location: penduduk/index");
        exit;
      }
    } else {
      header("Location: panel_login?error");
      exit;
    }
  } else {
    header("Location: panel_login?error1");
    exit;
  }
}

?>