<?php
$servername = "localhost";
$username = "root";
$password = ""; // Wprowadź swoje hasło do MySQL, jeśli istnieje
$dbname = "password_manager";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
