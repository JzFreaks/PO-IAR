<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="color-scheme" content="light dark" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
  <link rel="stylesheet" href="css/style.css"/>
  <title>Login System</title>

</head>
<body>
  <div class="container">

    <div class="right-content">
      <article class="form-container">
        <form action="login_process.php" method="POST">
          <header><h1>Login</h1></header>
          <fieldset>
            <label>
              <input type="text" name="uname" placeholder="Username" required autofocus/>
            </label>
            <label>
              <input type="password" name="upass" placeholder="Password" required/>
            </label>
          </fieldset>
          <input type="submit" name="ulogin" value="Login"/>
          <p>Don't have an account? <a href="signup.php" class="no-underline">Sign Up</a></p>
        </form>
      </article>
    </div>
  </div>
</body>
</html>
