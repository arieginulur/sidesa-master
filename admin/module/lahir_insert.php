<?php 
    require_once "../../config/koneksi.php";
   
    $data1 = $_POST["nama"];
    $data2 = $_POST["tanggal_lahir"];
    $data3 = $_POST["jk"];
    $data4 = $_POST["id_keluarga"];

    // Tambah Penduduk
    $penduduk = mysqli_query($conn, "INSERT INTO tbl_penduduk (nama, tanggal_lahir, jk, id_keluarga,id_status_keluarga,is_infamily) 
    VALUES ('$data1','$data2','$data3','$data4',4,1)");
    if($penduduk){
        $cekid = mysqli_query($conn, "SELECT MAX(id_penduduk) id_penduduk FROM tbl_penduduk");
        while($result = mysqli_fetch_array($cekid)){
            $id_penduduk = $result["id_penduduk"];
        }
        //Tambah Data Lahir
        $lahir = mysqli_query($conn, "INSERT INTO tbl_lahir (nama,tanggal_lahir,jk,id_keluarga,id_penduduk)
        VALUES ('$data1','$data2','$data3','$data4','$id_penduduk')");
        if($lahir){
            header("Location: ../lahir");
            exit();
        } else {
            echo "Error: ".$conn->connect_errno;
            exit();
        }
    } else {
        echo "Error: ".$conn->connect_errno;
        exit();
    }

    mysqli_close($conn);

?>