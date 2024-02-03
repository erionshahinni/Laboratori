<?php
session_start();

$hide = "hide"; 

if (isset($_SESSION['username']) && $_SESSION['role'] == "admin") {
    $hide = ""; 
}

if (isset($_POST['loginbtn'])) {
}
    class ContactPage{
    public function renderHeader()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>Contact Us</title>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
            <script>
                $(function() {
                    $(".toggle").on("click", function() {
                        $(".item").toggleClass("active");
                    });
                });

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
            <li class="item button"><a href="logout.php">Logout</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </div>
        <?php
    }

    public function renderContactSection()
    {
        ?>
        <div class="contact-content" id="contact-content">
            <div class="bashkohuni"><span style="font-size: 30pt; color: white;">Bashkohuni me ne</span></div>
            <div class="contact-1-2">
                <div class="contact-1">
                    <h2>Na <br> kontaktoni;</h2>
                    <div class="contact-1-1">
                        <h3 style="margin-top: 15px;">+383 (45) 111 111</h3>
                        <h3 style="margin-top: 15px;">info@pathology.com</h3>
                        <a href=""></a><img src="facebook.svg" alt="" width="50px" height="100px" style="margin-right: 5px;">
                        <a href=""></a><img src="facebook.svg" alt="" width="50px" height="100px" style="margin-right: 5px;">
                        <a href=""></a><img src="facebook.svg" alt="" width="50px" height="100px" style="margin-right: 5px;">
                        <a href=""></a><img src="facebook.svg" alt="" width="50px" height="100px" style="margin-right: 5px;">
                    </div>
                </div>
                <div class="contact-2">
                    <?php $this->renderContactForm(); ?>
                </div>
            </div>
        </div>
        <?php
    }

    public function renderContactForm()
    {
        ?>
        <form action="contactprocess.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Your Name" required>
            <div id="nameError" class="error-message"></div>
            <input type="email" name="email" id="email" placeholder="Your Email" required>
            <div id="emailError" class="error-message"></div>
            <textarea name="message" id="message" placeholder="Your Message" rows="4" required></textarea>
            <div id="messageError" class="error-message"></div>
            <button type="submit">Submit</button>
        </form>
        <?php
    }

    public function renderFooter()
    {
        ?>
        <div class="footer">
            <div class="hr"></div>
            <div class="footer-style">
                <span class="span-style">© All rights reserved 2023</span>
            </div>
        </div>
        </body>
        </html>
        <?php
    }
}


$contactPage = new ContactPage();


$contactPage->renderHeader();
$contactPage->renderContactSection();
$contactPage->renderFooter();
?>
