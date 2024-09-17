<?php 

session_start();
if(isset($_POST['submit'])){
    
    
    
    $server= "localhost";
    $username="root";
    $password="";
    $con= mysqli_connect($server,$username,$password);
    if(!$con){
        die("Connection not made due to".mysqli_connect_error());
    }
    
   $name= $_POST['j_name'];
   $description= $_POST['desc'];
   $location= $_POST['loc'];
   $pay=$_POST['pay'];
   $skills=$_POST['skills'];
   $age= $_POST['age'];
   $uid= uniqid($name);
   $id= $_SESSION['id'];
   
   $emp=$_SESSION['username'];
   $sql= "INSERT INTO `login`.`new_j_listings` (`name`, `description`, `job_id`, `location`,`pay`,`skills`,`age_group`,`employer`) VALUES ('$name', '$description','$uid, '$location', '$pay','$skills','$age','$emp');";
   if($con->query($sql) == true){
    echo "<h3 style='margin-left:400px;margin-top:20px;color:green' >You have successfully posted a job</h3>";
}
else{
   echo "ERROR: $con->error";
}
$con->close();
  
   

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Job</title>
 <link rel="stylesheet" href="css/style.css">
 <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
</head>
<body>
<header id="header">
  <nav id="nav-bar">
    <a class="nav-link" href="Profile.php">Profile</a>
  </nav>
</header>

<div class="post-container">
  <img class="img" src="images/about.png">
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
    <input type="tel" id="pnumber" name="ph" placeholder="Your phone number">
    <br>
    <input type="submit" name="submit" action="submit">
  </form>
</div>
</div>
</body>
</html>