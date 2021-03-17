<?php
    $msg = "";
   

    if (isset($_POST['submit'])){

        require_once 'dbh.php';

        $filename = $_FILES["uploadImg"]["name"];
        $tempname = $_FILES["uploadImg"]["tmp_name"];
        $fileError = $_FILES["uploadImg"]["error"];
        $fileSize = $_FILES["uploadImg"]["size"];
        

        $fileExt = explode('.', $filename);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

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



        if (in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;

                    $folder = "../profile/".$fileNameNew;

                    if (move_uploaded_file($tempname, $folder)){

                        $msg = "Image uploaded successfully";
            
                        $sql = "INSERT INTO users(ic,noStaff,fname,userid,pwd,uemail,uaddress,uposition,udepartment,cutiTahunan,imgName)
                        VALUES('$ic','$noStaff','$fname','$uid','$pwd','$Uemail','$Uaddress','$Uposition','$Udepartment','$cuti','$fileNameNew');";
            
                        mysqli_query($conn,$sql);
                        header("Location: ../adminPanel.php?msg=uploadsuccess");
            
                        }
                }else{
                    echo "File is too big";

                }
            }else{
                echo "Error in uploading img";
            }
        }else{
            echo "File not support";
        }
        
    }