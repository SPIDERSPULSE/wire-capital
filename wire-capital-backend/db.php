<?php
$host = "localhost";
$user = "root"; // Change if using another database user
$password = ""; // Set your MySQL password
$database = "wire_capital"; // Your database name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
