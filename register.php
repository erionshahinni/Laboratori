<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
            <li class="item button"><a href="logout.php"  class="<?php echo $hide ?>">Logout</a></li>
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
        <h2>Sign up</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="name" placeholder="name..."> <br>
        <input type="text" name="surname" placeholder="surname..."> <br>
        <input type="text" name="email" placeholder="email..."> <br>
        <input type="text" name="username" placeholder="username..."><br>
        <input type="text" name="password" placeholder="password..."><br><br>

        <input type="submit" name="registerBtn" value="register"><br>

        <div class="signup-link">
            <p>Already have an account? <a class="signup" href="login.php">Login</a></p>
        </div>
    </form>
    </div>
</div>
</div>
   <?php include_once 'registerController.php';?>
</body>
</html>