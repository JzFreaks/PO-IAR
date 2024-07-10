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
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light dark" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
  <title>Login System</title>
  <style>
    .no-underline {
    text-decoration: none;
  }
 </style>

</head>
<body>
  <div class="container">
    
      <article class="form-container">
        <form action="" method="POST">
          <?php if (!empty($message)) : ?>
          <div><?php echo $message; ?></div>
        <?php endif; ?>
          <header><h1>Sign Up</h1></header>
          <fieldset>
            <label>
              <input type="text" name="uname" placeholder="Username" required autofocus/>
            </label>
            <label>
              <input type="email" name="uemail" placeholder="Email" required/>
            </label>
            <label>
              <input type="password" name="upass" placeholder="Password" required/>
            </label>
          </fieldset>
          <input type="submit" name="usignup" value="Sign Up"/>
          <p>Already have an account? <a href="index.php" class="no-underline">Login</a></p>
        </form>
        
      </article>
    </div>
  </div>
</body>
</html>