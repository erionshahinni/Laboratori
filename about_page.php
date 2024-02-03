<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laboratori";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["add_content"])) {
        $newContent = $_POST["new_content"];
        $sqlAddContent = "INSERT INTO about_us_content (content) VALUES ('$newContent')";

        if ($conn->query($sqlAddContent) === TRUE) {
            echo "Content added successfully.<br>";
        } else {
            echo "Error adding content: " . $conn->error . "<br>";
        }
    }

    
    if (isset($_POST["add_staff"])) {
        $newImage = $_POST["new_image"];
        $newText = $_POST["new_text"];
        $sqlAddStaff = "INSERT INTO staff (image, text) VALUES ('$newImage', '$newText')";

        if ($conn->query($sqlAddStaff) === TRUE) {
            echo "Staff member added successfully.<br>";
        } else {
            echo "Error adding staff member: " . $conn->error . "<br>";
        }
    }

    
    if (isset($_POST["delete_staff_id"])) {
        $deleteStaffId = $_POST["delete_staff_id"];
        $sqlDeleteStaff = "DELETE FROM staff WHERE id = $deleteStaffId";

        if ($conn->query($sqlDeleteStaff) === TRUE) {
            echo "Staff member deleted successfully.<br>";
        } else {
            echo "Error deleting staff member: " . $conn->error . "<br>";
        }
    }

    
    if (isset($_POST["delete_content"])) {
        $sqlDeleteAboutUsContent = "DELETE FROM about_us_content";
        if ($conn->query($sqlDeleteAboutUsContent) === TRUE) {
            echo "About Us content deleted successfully.<br>";
        } else {
            echo "Error deleting About Us content: " . $conn->error . "<br>";
        }
    }
}


$sqlAboutUs = "SELECT content FROM about_us_content";
$resultAboutUs = $conn->query($sqlAboutUs);

if ($resultAboutUs->num_rows > 0) {
    $rowAboutUs = $resultAboutUs->fetch_assoc();
    $aboutContent = $rowAboutUs['content'];
} else {
    $aboutContent = "No content available.";
}


$sqlStaff = "SELECT id, image, text FROM staff";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>AboutAdminPage</title>
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
            <li class="item button"><a href="dashboard.php" class="<?php echo $hide ?>">Dashboard</a></li>
            <li class="item button"><a href="admin_page.php">Product Page</a></li>
            <li class="item button"><a href="product_page.php">Admin Page</a></h1></li>
            <li class="item button"><a href="about_page.php">Aboout Page</a></h1></li>
            <li class="item button"><a href="contact_page.php">Contact Page</a></h1></li>
            <li class="item button"><a href="logout.php">Logout</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </div>
    <h2>Add About Us Content</h2>
    <form method="post" action="">
        <label for="new_content">New Content:</label>
        <textarea name="new_content" rows="4" cols="50"></textarea>
        <button type="submit" name="add_content">Add Content</button>
    </form>

    <h2>Add Staff Member</h2>
    <form method="post" action="">
        <label for="new_image">Image URL:</label>
        <input type="text" name="new_image">
        <label for="new_text">Text:</label>
        <input type="text" name="new_text">
        <button type="submit" name="add_staff">Add Staff Member</button>
    </form>

    <h2>About Us Content</h2>
    <form method="post" action="">
        <button type="submit" name="delete_content">Delete About Us Content</button>
    </form>
    <p><?php echo $aboutContent; ?></p>

    <h2>Staff Members</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Text</th>
            <th>Action</th>
        </tr>
        <?php foreach ($sherbimet as $item) : ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['image']; ?></td>
                <td><?php echo $item['text']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="delete_staff_id" value="<?php echo $item['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
