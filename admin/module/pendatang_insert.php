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
    

    $insertpenduduk = mysqli_query($conn,"INSERT INTO tbl_penduduk ( nik,nama,tempat_lahir,tanggal_lahir,no_telp,email)
    VALUES ('$idpenduduk','$idkeluarga','$nik','$nama','$tempat_lahir','$tanggal_lahir','$no_telp','$email')");
    if($insertpenduduk){
        header("Location: ../pendatang_tambah?success");
        exit();
    } else {
        echo "Error: " . $conn -> connect_error;
    exit();
    }

    mysqli_close($conn);

?>