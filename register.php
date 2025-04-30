<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dietplan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


// Prepare the SQL query
$sql = "INSERT INTO diet(username,password,email) VALUES ('$username', '$password', '$email')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    // header("Location:signin.html");
    header("Location:r1.html");
} else {
    echo "Error inserting record: " . $conn->error;
}

$conn->close();
?>