<?php
session_start();

$hide = "hide"; 

if (isset($_SESSION['username']) && $_SESSION['role'] == "admin") {
    $hide = ""; 
}

if (isset($_POST['loginbtn'])) {

}
  if(isset($_POST['loginbtn'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
      echo "Please fill the required fields!";
    }else{
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        include_once 'users.php';
        $i=0;
        
        foreach($users as $user){
          if($user['username'] == $username && $user['password'] == $password){
            session_start();
      
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = $user['role'];
            $_SESSION['loginTime'] = date("H:i:s");
            header("location:index.php");
            exit();
          }else{
            $i++;
            if($i == sizeof($users)) {
              echo "Incorrect Username or Password!";
              exit();
            }
          }
        }
    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #0F3F6F;
        }
    </style>
</head>
<body>
<div class="nav">
        <ul class="menu">
            <li class="logo"><a href="index.php"><img src="images/1.svg" alt="" width="165px" height="75px"></a></li>
            <li class="item button"><a class="menua" href="index.php">Pathology</a></li>
            <li class="item button"><a class="menua" href="sherbimet.php">Sherbimet</a></li>
            <li class="item button"><a class="menua" href="produktet.php">Produktet</a></li>
            <li class="item button"><a class="menua" href="contact-us.php">Contact</a></li>
            <li class="item button"><a class="menua" href="about-us.php">Rreth nesh</a></li>
            <li class="item button"><a href="dashboard.php" class="<?php echo $hide ?>">Dashboard</a></li>
            <li class="item button"><a href="logout.php" class="<?php echo $hide ?>">Logout</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </div>
    <div class="login-container">
        <div class="login-1-2">
            <div class="login1">
                <a href="https://www.facebook.com/profile.php?id=100057148882669"><img src="images/f.svg" alt="ClientTrust" width="80px"></a>
                <a href="contact-us.html"><img src="images/logo-gmail.png" alt="ClientTrust" width="80px"></a>
            </div>
        <div class="login2">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="username" placeholder="username..."> <br>
        <input type="password" name="password" placeholder="password..."> <br>
        <input type="submit" name="loginbtn" value="Login"> 
            <div class="signup-link">
                <p>Don't have an account? <a class="signup" href="register.php" onclick="showSignupForm()">Sign up</a></p>
              </div>
        </form>
    </div>
    </div>
    </div>
</body>
</html>