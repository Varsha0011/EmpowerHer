<?php
// Database connection
$host = "localhost";
$dbname = "login";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch uploaded images from the database
$sql = "SELECT * FROM art_uploads ORDER BY upload_time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/art.css">

</head>
<body>
<h1 class="text-center my-4">Art Gallery</h1>
<div class="container">
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-sm-6 col-md-4 d-flex align-items-stretch mb-4">';
                echo '  <div class="card art-item" style="width: 18rem;">';
                echo '      <img src="' . htmlspecialchars($row['file_path']) . '" class="card-img-top" alt="' . htmlspecialchars($row['art_title']) . '">';
                echo '      <div class="card-body">';
                echo '          <h5 class="card-title">' . htmlspecialchars($row['art_title']) . '</h5>';
                echo '          <p class="card-text">Uploaded by: ' . htmlspecialchars($row['name']) . ' (' . htmlspecialchars($row['email']) . ')</p>';
                echo '          <p class="card-text">Upload Time: ' . date("F j, Y, g:i a", strtotime($row['upload_time'])) . '</p>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo "<p class='text-center'>No art found.</p>";
        }
        ?>
    </div>
    <div class="text-center my-4">
        <a href="artupload.php" class="btn btn-primary">Upload More Art</a>
    </div>
</div>


    
</body>
</html>

<?php
$conn->close();
?>
