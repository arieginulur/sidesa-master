<?php 
    require_once "../../config/koneksi.php";
    $id = $_POST["id"];
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

    $insertpenduduk = mysqli_query($conn,
    "UPDATE tbl_penduduk SET 
        nik = '$nik',
        nama = '$nama',
        tempat_lahir = '$tempat_lahir',
        tanggal_lahir = '$tanggal_lahir',
        jk = '$jk',
        no_telp = '$no_telp',
        email = '$email',
        id_pendidikan = '$pendidikan',
        id_agama = '$agama',
        id_pekerjaan = '$pekerjaan',
        id_status_kawin = '$status_kawin',
        kewarganegaraan = '$kewarganegaraan'
        WHERE id_penduduk = $id");

    if($insertpenduduk){
        header("Location: ../penduduk_edit?id=$id&success");
        exit();
    } else {
        echo "Error: " . $conn -> connect_error;
        exit();
    }

    mysqli_close($conn);

?>