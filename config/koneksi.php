<?php 
    //koneksi ke data base 
    $conn = mysqli_connect("localhost","root","","desa_kamasan");
    if(mysqli_connect_error()){
        printf("Koneksi error : ".mysqli_connect_error());
        exit();
    }

?>