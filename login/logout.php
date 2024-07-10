<?php
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['uid'])) {
    header("Location: index.php");
    exit();
}

// Handle logout if logout button is clicked
if (isset($_POST['logout'])) {
    // Unset all session variables
    session_unset();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to login page
    header("Location: index.php");
    exit();
}

?>