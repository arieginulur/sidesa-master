<?php 
    require_once "../../config/koneksi.php";
    $id_penduduk = $_GET["id1"];
    $id_kel = $_GET["id2"];
    $id_status_keluarga = $_GET["id3"];

    if($id_status_keluarga == 1){
        $updatekeluarga = mysqli_query($conn, "UPDATE tbl_keluarga SET id_penduduk = NULL WHERE id_keluarga = $id_kel");
        $updatependuduk = mysqli_query($conn, "UPDATE tbl_penduduk SET id_keluarga = NULL, is_infamily = 0, id_status_keluarga = 0
        WHERE id_penduduk = $id_penduduk");
        if($updatependuduk){
            header("Location: ../anggota_keluarga?id=$id_kel");
            exit();
        } else {
            echo "Error: ".$conn->connect_errno;
            exit();
        }
    } else {
        $insertkeluarga = mysqli_query($conn,
        "UPDATE tbl_penduduk SET id_keluarga = NULL, id_status_keluarga = 0, is_infamily = 0 WHERE id_penduduk = '$id_penduduk'");
        if($insertkeluarga){
            header("Location: ../anggota_keluarga?id=$id_kel");
            exit();
        } else {
            echo "Error: ".$conn->connect_errno;
            exit();
        }
    }

    
    mysqli_close($conn);
?>
