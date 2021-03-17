<?php
    $msg = "";
   

    if (isset($_POST['submit'])){

        require_once 'dbh.php';

        $filename = $_FILES["upload"]["name"];
        $tempname = $_FILES["upload"]["tmp_name"];
        $folder = "../profile/". $filename;

        $ic = $_POST["ic"];
        $noStaff = $_POST["staffid"];
        $fname = $_POST["name"];
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $Uemail = $_POST["email"];
        $Uaddress = $_POST["address"];
        $Uposition = $_POST["position"];
        $Udepartment = $_POST["department"];
        $cuti = $_POST["cutiTahunan"];
        

        $sql = "UPDATE users
                SET ic = '$ic',noStaff = '$noStaff',fname = '$fname',userid = '$uid',pwd = '$pwd',
                uemail = '$Uemail',uaddress = '$Uaddress',uposition = '$Uposition',udepartment = '$Udepartment',
                cutiTahunan='$cuti',imgName = '$filename'
                WHERE ic = '$ic';";
                
        mysqli_query($conn,$sql);

        if (move_uploaded_file($tempname, $folder)){
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }

        header("refresh:1; url = ../adminPanel.php");
    }