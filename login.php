<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="container">
    <div class="form-box box">

      <?php
      include "connection.php";

      if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

          $row = mysqli_fetch_assoc($res);
          $password = $row['password'];

          if (password_verify($pass, $password)) {
            // Set session variables
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];

            // Redirect to original page if set
            if (isset($_SESSION['redirect_to'])) {
              $redirect = $_SESSION['redirect_to'];
              unset($_SESSION['redirect_to']);
              header("Location: $redirect");
            } else {
              header("Location: home.php");
            }
            exit();

          } else {
            echo "<div class='message'>
                    <p>Wrong Password</p>
                  </div><br>";
            echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
          }

        } else {
          echo "<div class='message'>
                  <p>Wrong Email or Password</p>
                </div><br>";
          echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
        }

      } else {
      ?>
        <header>Login</header>
        <hr>
        <form action="login.php" method="POST">

          <div class="form-box">

            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input class="input-field" type="email" placeholder="Email Address" name="email" required>
            </div>

            <div class="input-container">
              <i class="fa fa-lock icon"></i>
              <input class="input-field password" type="password" placeholder="Password" name="password" required>
              <i class="fa fa-eye toggle icon"></i>
            </div>

            <div class="remember">
              <input type="checkbox" class="check" name="remember_me">
              <label for="remember">Remember me</label>
            </div>

          </div>

          <center><input type="submit" name="login" id="submit" value="Login" class="btn"></center>

          <div class="links">
            Don't have an account? <a href="signup.php">Signup Now</a>
          </div>

        </form>
    </div>
  <?php
      }
  ?>
  </div>

</body>

</html>
 