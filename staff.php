<?php
session_start();   
 if(!isset($_SESSION["position"])){
    header("Location: login.php");
 }
 if($_SESSION["position"] !== "Staff"){
    header("Location: login.php");
}
?>