<?php
session_start();

if (!isset($_SESSION["position"])){
    header("Location: login.php");
}
if($_SESSION["position"] !== "Ketua Eksekutif"){
    header("Location: login.php");
}
?>