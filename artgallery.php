<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $imageUrl = $conn->real_escape_string($_POST['imageUrl']);

    $sql = "INSERT INTO art_items (title, imageUrl) VALUES ('$title', '$imageUrl')";

    if ($conn->query($sql) === TRUE) {
        header('Location: home.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
