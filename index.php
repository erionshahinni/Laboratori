<?php
session_start();

$hide = "";
if (!isset($_SESSION['username'])) {
    header("location: login.php");
} else {
    if ($_SESSION['role'] == "admin") {
        $hide = "";
    } else {
        $hide = "hide";
    }
}

$trustContent = [
    ["image" => "images/microscope.svg", "text" => "Kualitet dhe profesionalizëm"],
    ["image" => "images/clients.svg", "text" => "Klientë vendorë dhe të jashtëm"],
    ["image" => "images/clientsTrust.svg", "text" => "Besim nga klientët 100%"],
];

$services = [
    ["image" => "images/9503.jpg", "text" => ["Pap Test", "Pap Test", "Pap Test", "Pap Test"]],
    ["image" => "images/a.jpg", "text" => ["Pap Test", "Pap Test", "Pap Test", "Pap Test"]],
    ["image" => "images/dna.png", "text" => ["Pap Test", "Pap Test", "Pap Test", "Pap Test"]],
];

function generateServiceContent($services)
{
    foreach ($services as $service) {
        echo '<div class="content">';
        echo '<div class="content-image">';
        echo '<img src="' . $service["image"] . '" alt="" width="50%">';
        echo '</div>';
        echo '<div class="content-text">';
        echo '<ul>';
        foreach ($service["text"] as $item) {
            echo '<li>' . $item . '</li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }
}


$aboutContent = "Our laboratory is equipped with the latest instruments and tools to facilitate a wide range of experiments. From high-performance microscopes that reveal the hidden structures of cells to advanced spectrophotometers that analyze the composition of substances, we have the resources necessary to conduct precise and insightful research. Each workstation is designed to provide a conducive environment for experimentation, ensuring accuracy and reliability in our findings.";


$contactContent = [
    "phone" => "+383 (45) 111 111",
    "email" => "info@pathology.com",
    "social_media" => [
        ["image" => "images/f.svg", "link" => "#"],
        ["image" => "images/f.svg", "link" => "#"],
        ["image" => "images/f.svg", "link" => "#"],
        ["image" => "images/f.svg", "link" => "#"]
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pathology</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".toggle").on("click", function() {
                $(".item").toggleClass("active");
            });
        });

        function validateForm() {
            let name = "<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>";
            let email = "<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>";
            let message = "<?php echo isset($_POST['message']) ? $_POST['message'] : ''; ?>";

            let nameRegex = /^[A-Z][a-z]{3,8}$/;
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!nameRegex.test(name)) {
                document.getElementById('emailError').innerText = 'Emrin.';
                return;
            }

            if (!emailRegex.test(email)) {
                document.getElementById('emailError').innerText = 'Please enter a valid email address.';
                return;
            }

            if (message.trim() === '') {
                document.getElementById('messageError').innerText = 'Please enter your message.';
                return;
            } else {
                document.getElementById('messageError').innerText = '';
            }

            alert('Form submitted successfully!');
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

    <div class="main-container">
        <div class="box">
            <p><em>Prioriteti ynë kryesor është shëndeti dhe mirëqenia juaj.</em></p>
            <br>
            <br>
            <h3>
                Laboratori
            </h3>
            <h1><strong>PATHOLOGY</strong></h1>
            <button class="contact-button"><a href="about-us.html">More</a></button>
        </div>
    </div>

    <div class="trust-content">
        <?php foreach ($trustContent as $trustItem) : ?>
            <div class="trust">
                <div class="trust-image">
                    <img src="<?php echo $trustItem['image']; ?>" alt="Trust Image" width="60px">
                </div>
                <div class="trust-text">
                    <span><?php echo $trustItem['text']; ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h1 id="sherbimet" style="display: flex; justify-content: center; margin-top: 150px; margin-bottom: 50px; border-radius: 10px;">Shërbimet Laboratorike</h1>
    <div class="sherbimet">
        <?php generateServiceContent($services); ?>
    </div>

    <div class="about-content">
        <div class="box-3-4">
            <div class="box3">
                <h2 class="per-ne">Për <br>ne;</h2>
            </div>
            <div class="box4">
                <p><?php echo $aboutContent; ?></p>
                <button class="contact-button"><a href="about-us.html">More</a></button>
            </div>
        </div>
    </div>

    <div class="contact-content" id="contact-content">
        <div class="bashkohuni"><span style="font-size: 30pt; color: white; ;">Bashkohuni me ne</span></div>
        <div class="contact-1-2">
            <div class="contact-1">
                <h2>Na <br> kontaktoni;</h2>
                <div class="contact-1-1">
                    <h3 style="margin-top: 15px;"><?php echo $contactContent["phone"]; ?></h3>
                    <h3 style="margin-top: 15px;"><?php echo $contactContent["email"]; ?></h3>
                    <?php foreach ($contactContent["social_media"] as $social) : ?>
                        <a href="<?php echo $social['link']; ?>"><img src="<?php echo $social['image']; ?>" alt="" width="50px" height="100px" style="margin-right: 5px;"></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="contact-2">
                <form action="contactprocess.php" method="POST">
                        <input type="text" id="name" placeholder="Your Name" required>
                        <div id="nameError" class="error-message"></div>
                        <input type="email" id="email" placeholder="Your Email" required>
                        <div id="emailError" class="error-message"></div>
                        <textarea id="message" placeholder="Your Message" rows="4" required></textarea>
                        <div id="messageError" class="error-message"></div>
                        <button type="submit">Submit</button>
                 </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="hr"></div>
        <div class="footer-style">
            <span class="span-style">© All rights reserved 2023</span>
        </div>
    </div>
</body>

</html>
