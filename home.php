<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoki - Home</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.svg">
    <link href="./assets/css/home.css?v=2" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        *{
            font-family: "Space Grotesk", serif;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include("components/logged_navbar.php"); ?>

    <!-- Main Content -->
    <section>
        <?php include("components/slideshow.php"); ?>
    </section>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
    <script src="./assets/js/script.js"></script>
</body>
</html>