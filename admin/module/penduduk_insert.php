<?php 
    require_once "../../config/koneksi.php";
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jk = $_POST["jk"];
    $agama = $_POST["id_agama"];
    $status_kawin = $_POST["id_status_kawin"];
    $pekerjaan = $_POST["id_pekerjaan"];
    $no_telp = $_POST["no_telp"];
    $email = $_POST["email"];
    $pendidikan = $_POST["id_pendidikan"];
    $kewarganegaraan = $_POST["kewarganegaraan"];

    $insertpenduduk = mysqli_query($conn,"INSERT INTO tbl_penduduk 
        (nik,nama,tempat_lahir,tanggal_lahir,jk,no_telp,email,id_pendidikan,id_agama,
        id_pekerjaan,id_status_kawin,kewarganegaraan,is_infamily)
        VALUES ('$nik','$nama','$tempat_lahir','$tanggal_lahir','$jk','$no_telp','$email','$pendidikan','$agama',
        '$pekerjaan','$status_kawin','$kewarganegaraan',0)");

    if($insertpenduduk){
        header("Location: ../penduduk_tambah?success");
        exit();
    } else {
        echo "Error: " . $conn -> connect_error;
        exit();
    }

    mysqli_close($conn);

?>