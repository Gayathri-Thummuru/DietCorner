<?php
$servername = "localhost";
$dbname = "dietplan";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT * FROM diet WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Valid user, redirect to plan.html
            header("Location: plan.html");
            exit();
        } else {
            // Invalid user, redirect to registration form
            header("Location: r1.html");
            exit();
        }
    } else {
        // Query execution failed
        echo "Query execution failed: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>
