<?php
session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}
?>


<?php
session_start();

// // Check if session variables are set
// if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
//     // Redirect to login page if not logged in
//     header("Location: login.php");
//     exit();
// }

if (isset($_POST['submit'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    
    // Connect to the database
    $con = new mysqli($server, $username, $password, "login");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Retrieve form data
    $name = $_POST['j_name'] ?? '';
    $description = $_POST['desc'] ?? '';
    $location = $_POST['loc'] ?? '';
    $pay = $_POST['pay'] ?? '';
    $skills = $_POST['skills'] ?? '';
    $age_group = $_POST['age'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $employer = $_SESSION['username']; // From session
    $job_id = uniqid($name);

    // Prepare and bind the SQL statement
    $sql = $con->prepare("INSERT INTO `new_j_listings` 
        (`name`, `description`, `job_id`, `location`, `pay`, `skills`, `age_group`, `employer`, `contact`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("sssssssss", $name, $description, $job_id, $location, $pay, $skills, $age_group, $employer, $contact);

    // Execute the query
    if ($sql->execute()) {
        echo "<h3 style='margin-left:400px;margin-top:20px;color:green'>You have successfully posted a job</h3>";
    } else {
        echo "ERROR: " . $sql->error;
    }

    // Close the statement and connection
    $sql->close();
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Job</title>
  <link rel="stylesheet" href="css/job.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
</head>
<body>
<header id="header">
  <nav id="nav-bar">
    <a class="nav-link" href="Profile.php">Profile</a>
  </nav>
</header>

<div class="post-container">
  <form method="post">
    <label for="jname">Job Name</label>
    <input type="text" id="jname" name="j_name" placeholder="Job name">
    <br>
    <label for="jobDescription">Job description</label>
    <textarea id="jobDescription" name="desc" placeholder="Job description..." style="height:100px"></textarea>
    <br>
    
    <label for="age">Age</label>
    <input type="tel" id="age" name="age" placeholder="Enter Age">
    
    <br>
    <label for="skills">Skills Required</label>
    <input type="text" id="skills" name="skills" placeholder="Enter skills required">
    <br>
    <label for="eName">Employer </label>
    <input type="text" id="eName" name="eName" placeholder="Employer's Name">
    <br>
    <label for="city">City</label>
    <input type="text" id="city" name="loc" placeholder="Enter city">
    <br>
    <label for="pnumber">Phone Number</label>
    <input type="tel" id="pnumber" name="contact" placeholder="Your phone number">
    <br>
    <input type="submit" name="submit" action="submit">
  </form>
</div>
</div>
</body>
</html>