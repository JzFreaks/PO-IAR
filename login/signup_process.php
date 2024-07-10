<?php
$message = ""; // Initialize empty message variable

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['usignup'])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $upass = $_POST['upass'];

    // Hash the password
    $hashed_pass = password_hash($upass, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (uname, uemail, upass) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $uname, $uemail, $hashed_pass);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "New user created successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>