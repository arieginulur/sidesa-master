<?php 
    require_once "../../config/koneksi.php";
   
    $data1 = $_POST["nama"];
    $data2 = $_POST["tanggal_lahir"];
    $data3 = $_POST["jk"];
    $data4 = $_POST["id_keluarga"];

    $add = mysqli_query($conn, "INSERT INTO (nama,tanggal_lahir,jk,id_keluarga)
    VALUES ('$data1','$data2','$data3','$data4')");

    if($add){
        header("Location: lahir");
    } else {
        echo "Error: ".$conn->connect_errno;
        exit();
    }

    mysqli_close($conn);

?>