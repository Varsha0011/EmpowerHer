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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header id="header">
    <!-- navbar section -->
    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">EmpowerHer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="jobportal.php">Job Portal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="artupload.php">Upload Art</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="postjob.php">Post Job</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</header>


<section class="profile-section" id="profile">
<div class="container d-flex justify-content-center align-items-center">
  <div class="card" style="width:auto;">
    <div class="card-body">
         <center><img src="images/user.jpg"></center>
      <center><h2><?php echo htmlspecialchars($name); ?></h2>
      <h2><?php echo htmlspecialchars($email); ?></h2> </center>  
    </div>
  </div>
</div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</body>
</html>
