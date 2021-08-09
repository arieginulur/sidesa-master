<?php 
    require_once "../../config/koneksi.php";
    $id_kel = $_GET["id"];
  
    $insertkeluarga = mysqli_query($conn,
    "UPDATE tbl_keluarga SET is_active = 1 WHERE id_keluarga = '$id_kel'");

    if($insertkeluarga){
        header("Location: ../anggota_keluarga?id=$id_kel");
        exit();
    } else {
        echo "Error: ".$conn->connect_errno;
        exit();
    }
    mysqli_close($conn);
?>