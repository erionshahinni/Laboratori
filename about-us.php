<?php
session_start();

$hide = "hide";

if (isset($_SESSION['username']) && $_SESSION['role'] == "admin") {
    $hide = ""; 
}

if (isset($_POST['loginbtn'])) {
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laboratori";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sqlAboutUs = "SELECT content FROM about_us_content";
$resultAboutUs = $conn->query($sqlAboutUs);

if ($resultAboutUs->num_rows > 0) {
    $rowAboutUs = $resultAboutUs->fetch_assoc();
    $aboutContent = $rowAboutUs['content'];
} else {
    $aboutContent = "No content available.";
}


$sqlStaff = "SELECT image, text FROM staff";
$resultStaff = $conn->query($sqlStaff);
$sherbimet = [];

if ($resultStaff->num_rows > 0) {
    while ($rowStaff = $resultStaff->fetch_assoc()) {
        $sherbimet[] = $rowStaff;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
</head>
    <script>
        $(function() {
            $(".toggle").on("click", function() {
                $(".item").toggleClass("active");
            });
        });


    let slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
    </script>

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
            <li class="item button"><a href="logout.php">Logout</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </div>
    <div class="about-content">
        <div class="box-3-4">
            <div class="box3">
                <h2 class="per-ne">Për <br>ne;</h2>
            </div>
            <div class="box4">
                <p><?php echo $aboutContent; ?></p>
                <button class="contact-button"><a href="contact-us.php">More</a></button>
            </div>
        </div>
    </div>

    <h1 id="sherbimert" style="display: flex; justify-content: center; margin-top: 150px; margin-bottom: 50px; border-radius: 10px;">Stafi i Laboratorit PATHOLOGY</h1>
    
    <div class="sherbimet">
        <?php foreach ($sherbimet as $item) : ?>
            <div class="content">
                <div class="content-image">
                    <img src="<?php echo $item['image']; ?>" alt="" width="50%">
                </div>
                <div class="content-text">
                    <p><?php echo $item['text']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/Profa.jpg" style="width:100%">
  <div class="text">Konference Patologjike</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/Stafi.jpg" style="width:100%">
  <div class="text">Stafi</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/MarreveshjaMeSuhareken.jpg" style="width:100%">
  <div class="text">Marreveshje</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

    
    <div class="footer">
        <div class="hr"></div>

        <div class="footer-style">
            <span class="span-style">© All rights reserved 2023</span>
        </div>
    </div>
</body>
</html>
