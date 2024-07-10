<?php
require "../database/db.php"; // Assuming this file sets up your database connection and initializes sessions

// Start session to access session variables
session_start();

// Check if the user is logged in, if not redirect to login page
if(!isset($_SESSION['uname'])) {
  header("Location: login.php"); // Redirect to login page if not logged in
  exit();
}

// Fetch username from session variable
$username = $_SESSION['uname'];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light dark" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
  <title>Dashboard</title>
</head>
<body>
  <div class="container">
    <div class="left-content">
      <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
      <p>This is your dashboard.</p>
      <form action="logout.php" method="POST">
        <input type="submit" name="logout" value="Logout"/>
      </form>
    </div>
    <div class="right-content">
      <!-- Other dashboard content here -->
    </div>
  </div>
</body>
</html>
