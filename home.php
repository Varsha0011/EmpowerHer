<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

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
                            <a class="nav-link" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jobportal.php">Job Portal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="artgallery.php">Art Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Profile.php">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- hero section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 text-content">
                    <h1>Welcome to EmpowerHer</h1>
                    <p>Your hub for empowerment through job opportunities and creative expression.</p>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <img src="images/homepic.png" alt="ruralwomen" class="img-fluid">
                </div>
            </div>
        </div>
    </section>


    <div id="gallery">
    <?php
            $sql = "SELECT title, imageUrl FROM art_items ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='art-item'>";
                    echo "<img src='" . $row["imageUrl"] . "' alt='" . $row["title"] . "'>";
                    echo "</div>";
                }
            } else {
                echo "No art available.";
            }
            $conn->close();
        ?>    
    </div>
    <form action="artgallery.php" method="POST" id="addArtForm">
    <input type="text" name="title" placeholder="Art Title" required>
    <input type="url" name="imageUrl" placeholder="Art URL" required>
    <button type="submit">Add Art</button>
</form>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
        <script src="script.js"> </script>
</body>

</html>