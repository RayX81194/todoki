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
    <link href="./assets/css/home.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <!-- Navbar -->
    <?php include("components/logged_navbar.php"); ?>

    <!-- Main Content -->
    <section>
        <?php include("components/slideshow.php"); ?>

        <div class="trends">
            <div class="title">
                <h1>Trending Games</h1>
                <a href="trending.php">See More <img src="./assets/arr_right.png" alt="arrow" style="width: 20px; height: 20px; rotate: 180deg;"></a>
            </div>
            <div class="trend-cards">
                <div class="trend-card">
                    <img src="assets/rdr2_pos.jpg" alt="Red Dead Redemption 2">
                    <div class="card-info">
                        <span>2018</span>
                        <h2>Red Dead Redemption 2</h2>
                    </div>
                </div>
                <div class="trend-card">
                    <img src="assets/rdr2_pos.jpg" alt="Red Dead Redemption 2">
                    <div class="card-info">
                        <span>2018</span>
                        <h2>Red Dead Redemption 2</h2>
                    </div>
                </div>
                <div class="trend-card">
                    <img src="assets/rdr2_pos.jpg" alt="Red Dead Redemption 2">
                    <div class="card-info">
                        <span>2018</span>
                        <h2>Red Dead Redemption 2</h2>
                    </div>
                </div>
                <div class="trend-card">
                    <img src="assets/rdr2_pos.jpg" alt="Red Dead Redemption 2">
                    <div class="card-info">
                        <span>2018</span>
                        <h2>Red Dead Redemption 2</h2>
                    </div>
                </div>
                <div class="trend-card">
                    <img src="assets/rdr2_pos.jpg" alt="Red Dead Redemption 2">
                    <div class="card-info">
                        <span>2018</span>
                        <h2>Red Dead Redemption 2</h2>
                    </div>
                </div>
                <div class="trend-card">
                    <img src="assets/rdr2_pos.jpg" alt="Red Dead Redemption 2">
                    <div class="card-info">
                        <span>2018</span>
                        <h2>Red Dead Redemption 2</h2>
                    </div>
                </div>              
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
    <script src="./assets/js/script.js"></script>
</body>
</html>