<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

// Replace 'YOUR_API_KEY' with your actual RAWG API key
$apiKey = 'eb60a4cf05bc40a09666b54f1647d74c';

// Fetch trending games
$trendingUrl = 'https://api.rawg.io/api/games?key=' . $apiKey . '&dates=2019-01-01,2023-12-31&ordering=-added&page_size=6';
$ch = curl_init($trendingUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$trendingResponse = curl_exec($ch);
curl_close($ch);
$trendingResult = json_decode($trendingResponse, true);
$trendingGames = $trendingResult['results'];

// Fetch upcoming games
$upcomingUrl = 'https://api.rawg.io/api/games?key=' . $apiKey . '&dates=2023-12-31,2024-12-31&ordering=-added&page_size=6';
$ch = curl_init($upcomingUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$upcomingResponse = curl_exec($ch);
curl_close($ch);
$upcomingResult = json_decode($upcomingResponse, true);
$upcomingGames = $upcomingResult['results'];
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
                <?php foreach ($trendingGames as $game): ?>
                    <div class="trend-card">
                        <a href="game.php?id=<?php echo $game['id']; ?>">
                            <img src="<?php echo $game['background_image']; ?>" alt="<?php echo $game['name']; ?>">
                        <div class="card-info">
                            <span><?php echo substr($game['released'], 0, 4); ?></span>
                            <h2><?php echo $game['name']; ?></h2>
                        </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="trends">
            <div class="title">
                <h1>Upcoming Games</h1>
                <a href="upcoming.php">See More <img src="./assets/arr_right.png" alt="arrow" style="width: 20px; height: 20px; rotate: 180deg;"></a>
            </div>
            <div class="trend-cards">
                <?php foreach ($upcomingGames as $game): ?>
                    <div class="trend-card">
                        <img src="<?php echo $game['background_image']; ?>" alt="<?php echo $game['name']; ?>">
                        <div class="card-info">
                            <span><?php echo substr($game['released'], 0, 4); ?></span>
                            <h2><?php echo $game['name']; ?></h2>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
    <script src="./assets/js/script.js"></script>
</body>
</html>