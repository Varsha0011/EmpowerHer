<?php
// Connect to the database
$servername = "localhost";
$username = "root"; // Use your database username
$password = ""; // Use your database password
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch job entries
$sql = "SELECT name, description, location, pay, skills, age_group, employer, contact FROM new_j_listings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> EmpowerHer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="postjob.php">Post Job</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="job-cards-container">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="job-card">';
                echo '<h3>' . $row["name"] . '</h3>';
                echo '<p><strong>Location:</strong> ' . $row["location"] . '</p>';
                echo '<p><strong>Pay:</strong> ' . $row["pay"] . '</p>';
                echo '<p><strong>Skills:</strong> ' . $row["skills"] . '</p>';
                echo '<p><strong>Age Group:</strong> ' . $row["age_group"] . '</p>';
                echo '<p><strong>Employer:</strong> ' . $row["employer"] . '</p>';
                echo '<p><strong>Contact:</strong> ' . $row["contact"] . '</p>';
                echo '<p>' . $row["description"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No job entries found.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
