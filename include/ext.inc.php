<?php
session_start();
if(isset($_POST["submit"]) && $_SESSION["position"] === "Ketua Eksekutif"){
    header("Location: ../ke.php");
}elseif(isset($_POST["submit"]) && $_SESSION["position"] === "Pengurus Staf"){
    header("Location: ../pengurus.php");
}elseif(isset($_POST["submit"]) && $_SESSION["position"] === "Staff"){
    header("Location: ../staff.php");
}else{
    header("Location: login.php");
}