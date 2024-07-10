<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ulogin'])) {
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
    $upass = $_POST['upass'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT uid, uname, upass FROM users WHERE uname = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $hashed_pass = $row['upass'];

        // Verify password
        if (password_verify($upass, $hashed_pass)) {
            // Password is correct, start session and store user data
            $_SESSION['uid'] = $row['uid'];
            $_SESSION['uname'] = $row['uname'];

            // Redirect to dashboard or any other page
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>