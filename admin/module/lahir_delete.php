<?php
    require_once "../../config/koneksi.php";
    $id2 = $_POST["id2"];

    $delete = mysqli_query($conn, "DELETE FROM tbl_keluarga WHERE id_keluarga = '$id2' ");

    if($delete){
        header("Location: ../lahir");
        exit();
    } else {
        echo "Error: " . $conn -> connect_error;
        exit();
    }
?>