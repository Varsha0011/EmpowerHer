<?php
session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}
?>


<?php
// Start the session to access user info
session_start();

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $art_title = $_POST['art_title'];
    // Fetch the name and email from the session
    $name = $_SESSION['username'] ; 
    $email = $_SESSION['email'] ; 
    // Handle file upload
    $target_dir = "uploads/";
    $file_name = basename($_FILES["art_image"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name; // Unique file name using timestamp
    $upload_ok = 1;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["art_image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $upload_ok = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES["art_image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $upload_ok = 0;
    }

    // Allow certain file formats
    if (!in_array($image_file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $upload_ok = 0;
    }

    // Check if $upload_ok is set to 0 by an error
    if ($upload_ok == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["art_image"]["tmp_name"], $target_file)) {
            // Insert into database
            $stmt = $conn->prepare("INSERT INTO art_uploads (art_title, file_path, name, email) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $art_title, $target_file, $name, $email);

            if ($stmt->execute()) {
                echo "The file " . htmlspecialchars($file_name) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/art.css">

</head>
<body>

    <h1>Upload Your Art</h1>
    <form action="artupload.php" method="post" enctype="multipart/form-data">
        <label>Art Title:</label>
        <input type="text" name="art_title" required>
        
        <label>Select Image:</label>
        <input type="file" name="art_image" accept="image/*" required>
        
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
        
        <button type="submit">Upload Art</button>
    </form>

    <a href="artgallery.php">View Gallery</a>

</body>
</html>
