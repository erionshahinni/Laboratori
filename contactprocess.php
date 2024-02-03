<?php

include 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Të dhënat u ruajtën me sukses!";
    

    header("Location: contact-us.php");
    exit();
} else {
    echo "Gabim: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
