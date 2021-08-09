<?php
    session_start();
    if(!isset($_SESSION["Login"]) || $_SESSION["Login"]!= true){
        header("Location: ../panel_admin");
        exit;
    } else if($_SESSION["level"] == "admin"){
        $_SESSION ["Login"] = true;
    } else if($_SESSION["level"] == "operator"){
        $_SESSION["Login"] = true;
        $_SESSION["operator"] = true;
    } else {
        header("Location: ../index?error");
    }
?>