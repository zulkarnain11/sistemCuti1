<?php
session_start();

if(!isset($_SESSION["user"])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
     rel="stylesheet">
</head>
<body>
    <div class="log-out">
    <p><a href="logout.php"><img src="icon/logout.svg"> Logout</a></p>
    </div>
    <div class="sysabout">
        <div class="logo">
            <img src="image/logoktd1.png" />
        </div>
        
        <h1>Online Leave Management System</h1>

        <h5>Online Leave Management System merupakan sistem yang memudahkan pensyarah dan staf bagi membuat permohonan cuti secara dalam talian dengan merujuk maklumat asas staf. Sistem ini merupakan satu alternatif yang diperlukan oleh pensyarah dan staf bagi menggantikan sistem permohonan cuti secara manual. Sistem ini juga dapat memberi capaian maklumat dengan pantas kepada pihak pengurusan untuk pelaporan yang berkaitan.</h5>
    
        <form action="include/ext.inc.php" method="POST">
            <input type="submit" name="submit" value="Continue"/>
        </form>
    </div>
</body>
</html>