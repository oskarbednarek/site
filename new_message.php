<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$user = $_POST['username'];
$message = $_POST['message'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO chat (username, message) VALUES (?, ?)");
$stmt->bind_param("ss", $user, $message);

// Execute the statement
if ($stmt->execute()) {
    echo "New message sent successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>