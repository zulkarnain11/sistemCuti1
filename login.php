<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
     rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="about">
        <img src="image/logoktd1.png" />
        <h1>Online Leave Management System</h1>
      </div>
      <div class="log-in">
        <form action="include/login.inc.php" method="POST">
            <h1>LOGIN</h1>

            <?php
              if(isset($_GET["error"])){
                if($_GET["error"]=="emptyInput"){
                  echo "<p class='msg'>*Fill in all fields!*</p>";
                }elseif($_GET["error"]=="passwordnotmatch"){
                  echo "<p class='msg'>*Password not match!*</p>";
                }elseif($_GET["error"]=="invalidUsername"){
                  echo "<p class='msg'>*Enter a username!*</p>";
                }elseif($_GET["error"]=="midlefinger!!!"){
                  echo "<script>alert('Wau yakinnya kamu __|__')</script>";
                }elseif($_GET["error"]=="inputnotmatch"){
                  echo "<p class='msg'>*Input not match!*</p>";
                }
              }

            ?>
                           
            <img src="icon/user.svg" width="40px"/>
            <input type="text" name="username" placeholder="Username" autocomplete="off"/><br/>
            
            <img src="icon/padlock.svg" width="40px"/>
            <input type="password" name="pwd" placeholder="Password"/>
            

            <input type="submit" name="submit" value="Login"/>
            <p><a href="adminlogin.php">Login as admin ..</p>
        </form>
      </div>
    </div>
    <div class="footer">

    </div>
</body>
</html>
