<?php 
    require_once "../../config/koneksi.php";
    $idpenduduk = $_POST["id1"];
    $idkeluarga = $_POST["id2"];

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

    //Tabel Keluarga
    $updatekeluarga = mysqli_query($conn,"UPDATE tbl_keluarga SET
    no_kk = '$no_kk', alamat = '$alamat', rt = '$rt', rw = '$rw' WHERE id_keluarga = $idkeluarga AND id_penduduk = $idpenduduk");
    if($updatekeluarga){
        //Tabel Penduduk
        $updatependuduk = mysqli_query($conn,
        "UPDATE tbl_penduduk SET
        nik = '$nik', nama='$nama', tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir', jk='$jk',no_telp='$no_telp',email='$email'
        WHERE id_penduduk = $idpenduduk");
        if($updatependuduk){
            header("Location: ../lahir_edit?id1=$idpenduduk&id2=$idkeluarga&success");
            exit();
        } else {
            header("Location: ../lahir_edit?id1=$idpenduduk&id2=$idkeluarga&success");
            exit();
        }
    } else {
        echo "Error: " . $conn -> connect_error;
        exit();
    }

    mysqli_close($conn);

?>