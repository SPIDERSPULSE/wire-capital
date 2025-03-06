<?php
// Database connection
$host = "localhost";
$username = "root"; // Default for XAMPP
$password = ""; // No password in XAMPP by default
$database = "wire_capital";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and insert data into the database
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "Success"; // Send response back to frontend
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
