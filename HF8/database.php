<?php

//CREATE TABLE users (
//    id INT AUTO_INCREMENT PRIMARY KEY,
//    username VARCHAR(50) NOT NULL,
//    password VARCHAR(255) NOT NULL
//);

$servename = 'localhost';
$username = 'root';
$password = '';
$dbname = "egyetem";

$conn = new mysqli($servename, $username, $password, $dbname);


if ($conn->connect_error) {
die("Connection filed: " . $conn->connect());
} else {
echo ("Connection is successfully". "<br>");
}
?>


