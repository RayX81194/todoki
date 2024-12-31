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
        .trend-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .trend-card {
            width: 200px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
        }
        .trend-card img {
            width: 100%;
            height: auto;
            transition: .1s ease-in-out;

        }
        .card-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: end;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 10px;
            opacity: 0;
            transition: opacity .1s ease-in-out;
        }
        .trend-card:hover .card-info {
            opacity: 1;
        }
        .card-info h2 {
            font-size: 18px;
            margin: 10px 0 5px;
        }
        .card-info span {
            font-size: 14px;
            color: #ccc;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include("components/logged_navbar.php"); ?>

    <!-- Main Content -->
    <section>
        <?php include("components/slideshow.php"); ?>

        <div class="trends">
            <h1>Trending Games</h1>
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
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
    <script src="./assets/js/script.js"></script>
</body>
</html>