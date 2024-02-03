<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ContactAdminPanel</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".toggle").on("click", function() {
                $(".item").toggleClass("active");
            });
        });
     </script>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

.dashboard-container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.contact-item {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 5px;
    background-color: #fff;
}

.label {
    font-weight: bold;
    color: #333;
}

button {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 3px;
}

button:hover {
    background-color: #c82333;
}


    </style>
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


<div class="dashboard-container">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laboratori";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Lidhja me bazën e të dhënave dështoi: " . $conn->connect_error);
}
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_sql = "DELETE FROM contact WHERE id = $delete_id";
    
    if ($conn->query($delete_sql) === TRUE) {
        echo "Kontakti u fshi me sukses!";
    } else {
        echo "Gabim: " . $delete_sql . "<br>" . $conn->error;
    }
}


$sql = "SELECT * FROM contact";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="contact-item">';
        echo '<p><span class="label">Emri:</span> ' . $row["name"] . '</p>';
        echo '<p><span class="label">Email:</span> ' . $row["email"] . '</p>';
        echo '<p><span class="label">Mesazhi:</span> ' . $row["message"] . '</p>';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="delete_id" value="' . $row["id"] . '">';
        echo '<button type="submit">Fshi</button>';
        echo '</form>';
        echo '</div>';
    }
} else {
    echo "Nuk ka të dhëna për të shfaqur.";
}


$conn->close();
?>

</div>

</body>
</html>