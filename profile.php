<?php
session_start();
include "connection.php";

// Check if session variables are set
if (!isset($_SESSION['email']) || !isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login page if session variables are not set
    exit();
}

$email = $_SESSION['email'];
$name = $_SESSION['username'];

// Database connection
$server = "localhost";
$username = "root";
$password = "";
$database = "login";

$con = new mysqli($server, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Prepared statement to prevent SQL injection
$stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$record = $result->fetch_assoc();

$stmt->close();
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
<header id="header">
    <!-- <div id="brand">
        <a href="Home.php"><img id="header-img" src="images/homepic.png" alt="Home"></a>
    </div> -->
     <!-- navbar section -->
     <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php"> EmpowerHer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jobportal.php">Job Portal</a>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</header>
<h1>Your Profile</h1>
<section class="profile-section" id="profile">
<div class="container d-flex justify-content-center align-items-center">
  <div class="card" style="width: 30rem;">
    <img src="images/user.png" class="card-img-top" alt="User Image">
    <div class="card-body">
      <h2>Name: <?php echo htmlspecialchars($name); ?></h2>
      <h2>Email: <?php echo htmlspecialchars($email); ?></h2>
      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <a href="artupload.php" class="btn">Upload Art</a>
        <a href="PostJob.php" class="btn">Post a Job</a>
        <a href="jobportal.php" class="btn">Find a Job</a>
      </div>
    </div>
  </div>
</div>
</section>



</body>
</html>
