<?php 
    require_once "../../config/koneksi.php";
    $no_kk = $_POST["no_kk"];
    $alamat = $_POST["alamat"];
    $rt = $_POST["rt"];
    $rw = $_POST["rw"];
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jk = $_POST["jk"];
    $no_telp = $_POST["no_telp"];
    $email = $_POST["email"];

    $getidkeluarga = mysqli_query($conn, "SELECT MAX(id_keluarga) id_keluarga FROM tbl_keluarga");
    while ($maxidkeluarga = mysqli_fetch_assoc($getidkeluarga)){
        $idkeluarga = $maxidkeluarga["id_keluarga"] + 1;
    }

    $getidpenduduk = mysqli_query($conn, "SELECT MAX(id_penduduk) id_penduduk FROM tbl_penduduk");
    while ($maxidpenduduk = mysqli_fetch_assoc($getidpenduduk)){
        $idpenduduk = $maxidpenduduk["id_penduduk"] + 1;
    }

    //Tabel Keluarga
    $insertkeluarga = mysqli_query($conn,"INSERT INTO tbl_keluarga (id_keluarga,id_penduduk,no_kk,alamat,rt,rw) 
    VALUES ('$idkeluarga','$idpenduduk','$no_kk','$alamat','$rt','$rw')");
    if($insertkeluarga){
        $insertpenduduk = mysqli_query($conn,"INSERT INTO tbl_penduduk (id_penduduk,id_keluarga,nik,nama,tempat_lahir,tanggal_lahir,no_telp,email)
        VALUES ('$idpenduduk','$idkeluarga','$nik','$nama','$tempat_lahir','$tanggal_lahir','$no_telp','$email')");
        if($insertpenduduk){
            header("Location: ../pindah_tambah?success");
            exit();
        } else {
            header("Location: ../pindah_tambah?success");
            exit();
        }
    } else {
        echo "Error: " . $conn -> connect_error;
        exit();
    }

    mysqli_close($conn);

?>