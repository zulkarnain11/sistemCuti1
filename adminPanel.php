<?php
session_start();

 if(!isset($_SESSION['user'])){
    header("Location: login.php?error=midlefinger!!!");
 }
 include_once 'include/dbh.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
     rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="welcome">
            <h1>Welcome <?php
            echo $_SESSION['user'];
            ?></h1>
            
        </div>

        <div class="log-out">
            <p><a href="logout.php"><img src="icon/logout.svg" width="15px"> Logout</a></p>
        </div>

        <div class="btn">
            
            <button id="btn1" onclick="hide()">Add User</button>
            <form class="adduser" id="addUser" action="include/adduser.inc.php" method="POST" enctype="multipart/form-data">
                
                <table>
                    
                    <tr>
                        <td>Profile Picture:</td>
                        <td><input type="file" name="uploadImg"></td>
                    </tr>
                    <tr>
                        <td>No.IC:</td>
                        <td><input type="text" name="ic" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td>No.Staff:</td>
                        <td><input type="text" name="staffid" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="name" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="uid" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="pwd"/></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email"/></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input type="text" name="address" width="200" height="300"/></td>
                    </tr>
                    <tr>
                        <td>Position:</td>
                        <td><select name="position" id="">
                            <option>Ketua Eksekutif</option>
                            <option>Pengurus Staf</option>
                            <option>Staff</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Department:</td>
                        <td><select name="department" id="department">
                            <option>JHEA - JABATAN HAL EHWAL AKADEMIK</option>
                            <option>JHEP - JABATAN HAL EHWAL PELAJAR</option>
                            <option>JKEW - JABATAN KEWANGAN</option>
                            <option>JPPHL - JABATAN PENGAMBILAN PELAJAR DAN HUBUNGAN LUAR</option>
                            <option>JPENDAFTAR - JABATAN PENDAFTAR</option>
                            <option>JKUALITI - JABATAN KUALITI</option>
                        </select></td>
                    </tr>
                    
                    <tr>
                        <td>Leave entitlement:</td>
                        <td><input type="number" name="cutiTahunan"></td>
                    </tr>
                </table>
                <input type="submit" name="submit" value="Submit">
                <input type="reset"  value="Cancel">

                <?php
                    if(isset($_GET["msg"])){
                        if($_GET["msg"]=="uploadsuccess"){
                            echo "<script>alert('successfully added user');</script>";
                        }
                    }
                ?>
            </form>
            <button id="btn2" onclick="hide1()">Edit User</button>
            
            <form class="edit" id="edit" action="adminPanel.php" method="POST">
                <input type="text" name="ic" placeholder="NO. IC">
                <input type="submit" onclick="hide3()" name="cari" value="Search">
            </form>
            
            <div class="edit-search" >
            <form action="include/edituser.inc.php" method="POST" enctype="multipart/form-data">
                <table id="information">
                <?php 
                if (isset($_POST['cari'])){
                    
                    $ic = $_POST['ic'];
                    $sql = "SELECT * FROM users WHERE ic = '$ic';";

                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                    echo
                    '<tr>
                        <td><img src="profile/'.$row['imgName'].'"></td>
                        <td valign="bottom">: <input type="file" name="upload" required></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><hr/></td>
                        <td><hr/></td>
                    </tr>
                    <tr>
                        <td>No.IC</td>
                        <td>: <input type="text" name="ic" autocomplete="off" value="'.$row['ic'].'" required/></td>
                    </tr>
                    <tr>
                        <td>No.Staff</td>
                        <td>: <input type="text" name="staffid" autocomplete="off" value="'.$row['noStaff'].'"/></td>
                    </tr>
                    <tr>
                        <td>Full name</td>
                        <td>: <input type="text" name="name" autocomplete="off" value="'.$row['fname'].'"/></td>
                    </tr>
                
                    <tr>
                        <td>Username</td>
                        <td>: <input type="text" name="uid" autocomplete="off" value="'.$row['userid'].'"/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>: <input type="password" name="pwd" value="'.$row['pwd'].'"/></td>
                    </tr>
                    <tr>
                        <td >Email</td>
                        <td>: <input type="email" name="email" value="'.$row['uemail'].'"/></td>
                    </tr>
                    
                    <tr>
                        <td>Address</td>
                        <td>: <input name="address" value="'.$row['uaddress'].'"> </td>
                    </tr>
                
                    <tr>
                        <td>Position</td>
                        <td>: <select name="position"  value="'.$row['uposition'].'">
                        <option>Ketua Eksekutif</option>
                        <option>Pengurus Staff</option>
                        <option>Staff</option>
                    </select></td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>: <select name="department" id="department1" value="'.$row['udepartment'].'">
                            <option>JHEA - JABATAN HAL EHWAL AKADEMIK</option>
                            <option>JHEP - JABATAN HAL EHWAL PELAJAR</option>
                            <option>JKEW - JABATAN KEWANGAN</option>
                            <option>JPPHL - JABATAN PENGAMBILAN PELAJAR DAN HUBUNGAN LUAR</option>
                            <option>JPENDAFTAR - JABATAN PENDAFTAR</option>
                            <option>JKUALITI - JABATAN KUALITI</option>
                    </select></td>
                    </tr>
                    <tr>
                        <td>Leave entitlement</td>
                        <td>: <input type="number" name="cutiTahunan" value="'.$row['cutiTahunan'].'"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><hr/></td>
                        <td><hr/></td>
                    </tr>

                    <tr>
                        
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="submit" value="Update">
                        </td>
                    </tr>                   
                    ';}
                    }else{
                    echo "<tr>  
                            <td>Record Not Found</td>
                         </tr>";
                    }
                }
                ?>   
                </table>
            </form>
            </div>
            

            <button id="btn3" onclick="hide2()">Delete User</button>
            <form class="delete" id="delete" action="#" method="POST">
                <input type="text" name="ic" placeholder="NO. IC">
                <input type="submit" name="delete" value="Delete">
            </form>

            <div>
            <div class="delete-user" >
                
                <?php
                    if (isset($_POST['delete'])){
                        
                        
                        $ic = $_POST['ic'];
                        $sql = "DELETE FROM users WHERE ic = '$ic'";

                       

                        if(mysqli_query($conn,$sql)){
                            echo "<script>alert('Data have been deleted')</script>";
                        }else{
                            echo "Error happen";
                        }
                    
                    }
                            
                ?>
                
            </div>
            </div>
        </div>
    </div>
    <div class="footer">
    </div>

<script src="js/script.js"></script>

</body>
</html>