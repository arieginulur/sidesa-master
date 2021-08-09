<?php
    session_start();
    if(!isset($_SESSION["Login"]) || $_SESSION["Login"]!= true){
        header("Location: ../panel_admin");
        exit;
    } else if($_SESSION["Login"] == true){
        $_SESSION ["Login"] = true;
    } else {
        header("Location: ../index?error");
    }
?>