<?php

if (isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['pwd'];

    require_once 'dbh.php';
    require_once 'function.inc.php';

    if (emptyInputlogin($username,$password) !== false){
        header("Location: ../login.php?error=emptyInput");
        exit();
    }

    if (invalidUsernamelogin($username) !== false){
        header("Location: ../login.php?error=invalidUsername");
        exit();
    }

    if (notMatch($conn, $username, $password) !== false){
        header("Location: ../login.php?error=passwordnotmatch");
    }

    $sql = "SELECT * FROM users WHERE userid = '$username' and pwd = '$password';";
    $sqlrun = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($sqlrun)){
        
        $user = $row["userid"];
        $pwd = $row["pwd"];
        $position = $row["uposition"];
    

        if($username === $user && $password === $pwd){
            session_start();
            $_SESSION["user"] = $user;
            $_SESSION["position"] = $position;
            header("Location: ../index.php?loginSuccess");
                   
        }else{
            header("Location: ../login.php?error=inputnotmatch");
        }
        
            
        
    }
}else{
    header("Location: ../login.php?error=enterInput");
}
