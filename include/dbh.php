<?php

$DBserverName = "localhost";
$DBUserName = "root";
$DBserverPwd = "";
$DBName = "sistemCuti";

$conn = mysqli_connect($DBserverName,$DBUserName,$DBserverPwd,$DBName);

if (!$conn){
    die("Connect to database Failed".mysqli_connect_error());
}

