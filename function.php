<?php
include "config/koneksi.php";
function registrasi($data) {
    global $conn;

    $nik = strtolower(stripslashes($data["nik"]));
    $no_kk=strtolower(stripslashes($data["no_kk"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $level = "warga";
    
    // cek username sudah ada atau belum 

    $result = mysqli_query($conn, "SELECT nik FROM penduduk WHERE nik = '$nik'");
    if (mysqli_fetch_array($result)) {
        echo "<script>
        alert('Username sudah terdaftar!'
              </script>";
              return false;
    }


    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script> 
                alert('Konfirmasi Password Tidak Sesuai!');
               </script> ";
        return false;
    }
    // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

// tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nik', '$no_kk', '$password','$level' )");

    return mysqli_affected_rows($conn);
}
// tambahh data penduduk
function input($data) {
    global $conn;

    $nik = strtolower(stripslashes($data["nik"]));
    $nama=strtolower(stripslashes($data["nama"]));
    $JK=strtolower(stripslashes($data["JK"]));
    $alamat=strtolower(stripslashes($data["alamat"]));
    $no_kk=strtolower(stripslashes($data["no_kk"]));
    

// tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO data_penduduk VALUES('', '$nik', '$nama', '$JK', '$alamat', '$no_kk' )");

    return mysqli_affected_rows($conn);
}
function query($query) {

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row; 
    }
    return $rows;
}

?>