<?php
    require_once "../../config/koneksi.php";
    $id = $_POST["id"];

    $delete = mysqli_query($conn, "DELETE FROM tbl_penduduk WHERE id_penduduk = '$id' ");

    if($delete){
        header("Location: ../penduduk");
        exit();
    } else {
        echo "Error: " . $conn -> connect_error;
        exit();
    }
?>