<?php 
    require_once "../../config/koneksi.php";
    $no_kk = $_POST["no_kk"];
    $alamat = $_POST["alamat"];
    $rt = $_POST["rt"];
    $rw = $_POST["rw"];
    $nama_kk = $_POST["nama_kk"];
    $desa = $_POST["desa"];
    $kec = $_POST["kecamatan"];
    $kab = $_POST["kabupaten"];
    $prov = $_POST["provinsi"];
    $is_active = 0;
    $is_pendataan = 0;
    $is_login = 0;

    $insertkeluarga = mysqli_query($conn,
    "INSERT INTO tbl_keluarga (no_kk,alamat,rt,rw,nama_kk,desa_kelurahan,kecamatan,kabupaten,provinsi,is_active,is_pendataan,is_login) 
    VALUES ('$no_kk','$alamat','$rt','$rw','$nama_kk','$desa','$kec','$kab','$prov','$is_active','$is_pendataan','$is_login')");

    if($insertkeluarga){
        header("Location: ../kepala_keluarga_tambah?success");
        exit();
    } else {
        echo "Error: ".$conn->connect_error;
        exit();
    }

    mysqli_close($conn);

?>