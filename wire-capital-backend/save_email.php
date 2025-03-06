<?php
// Database connection
$host = "localhost";
$username = "root"; // Default for XAMPP
$password = ""; // No password by default
$database = "wire_capital";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if request is POST and email is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];

    // Prevent duplicate entries
    $stmt = $conn->prepare("INSERT IGNORE INTO newsletter (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "Success"; // Response for frontend
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
