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
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
