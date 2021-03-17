<?php

require_once 'dbh.php';

function emptyInput($adminUser,$adminpwd){
    $result = "";
    if(empty($adminUser || $adminpwd)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUsername($adminUser){
    $result = "";
    if (empty($adminUser)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emptyInputlogin($username,$password){
    $result = "";
    if(empty($username || $password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUsernamelogin($username){

    $result = "";
    if (empty($username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
} 

function notMatch($conn, $username, $password){
    $result = "";
    $sql = "SELECT userid,pwd FROM users WHERE userid = '$username' and pwd = '$password';";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        if($username !== $row['userid'] && $password !== $row['pwd']){
            return true;
        }else{
            return false;
        }
    }
    return true;
}