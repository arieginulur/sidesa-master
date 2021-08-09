<?php 
    require_once "../../config/koneksi.php";
    $id_kel = $_GET["id"];
    $default = "desakamasan123";
    $hash = password_hash($default, PASSWORD_DEFAULT);

    $insertkeluarga = mysqli_query($conn,
    "UPDATE tbl_keluarga SET password = '$hash' WHERE id_keluarga = '$id_kel'");

    if($insertkeluarga){
        header("Location: ../anggota_keluarga?id=$id_kel");
        exit();
    } else {
        echo "Error: ".$conn->connect_errno;
        exit();
    }
    mysqli_close($conn);
?>

