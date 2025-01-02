<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

// Check if game ID is provided
if (!isset($_GET['id'])) {
    echo "No game ID provided.";
    exit;
}

// Replace 'YOUR_API_KEY' with your actual RAWG API key
$apiKey = 'eb60a4cf05bc40a09666b54f1647d74c';
$gameId = $_GET['id'];

// Fetch game details
$gameUrl = 'https://api.rawg.io/api/games/' . $gameId . '?key=' . $apiKey;
$ch = curl_init($gameUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$gameResponse = curl_exec($ch);
curl_close($ch);
$gameDetails = json_decode($gameResponse, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $gameDetails['name']; ?> - Todoki</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.svg">
    <link href="./assets/css/game.css?v=4" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">

</head>
<body>
    <!-- Navbar -->
    <?php include("components/logged_navbar.php"); ?>

    <!-- Main Content -->
    <div class="container">
        <section class="game-details">
            <div class="game-info">
                <h1><?php echo $gameDetails['name']; ?></h1>
                <p><?php echo $gameDetails['description_raw']; ?></p>
                <p><strong>Released:</strong> <?php echo $gameDetails['released']; ?></p>
                <p><strong>Rating:</strong> <?php echo $gameDetails['rating']; ?> / 5</p>
                <p><strong>Metacritic:</strong> <?php echo $gameDetails['metacritic']; ?></p>
                <p><strong>Playtime:</strong> <?php echo $gameDetails['playtime']; ?> hours</p>
                <p><strong>Platforms:</strong></p>
                        <p>
                            <?php
                            foreach ($gameDetails['platforms'] as $platform) {
                                echo $platform['platform']['name'] . "<br>";
                            }
                            ?>
                        </p>
                <p><strong>Tags:</strong>
                    <?php
                    foreach ($gameDetails['tags'] as $tag) {
                        echo $tag['name'] . ", ";
                    }
                    ?>
            </div>
            <div class="additional-info">
                <div class="game-image">
                    <img src="<?php echo $gameDetails['background_image']; ?>" alt="<?php echo $gameDetails['name']; ?>">
                </div>
                <a href="<?php echo $gameDetails['website']; ?>" target="_blank" class="btn"><img src="./assets/arr_right.png" alt="Website Icon">Visit Website</a>
                <div class="dev-info">
                    <div class="info">
                        <h2>Developer:</h2>
                        <p><?php echo $gameDetails['developers'][0]['name']; ?></p>
                    </div>
                    <div class="info">
                        <h2>Publisher:</h2>
                        <p><?php echo $gameDetails['publishers'][0]['name']; ?></p>
                    </div>
                    <div class="info">
                        <h2>Genre:</h2>
                        <p><?php echo $gameDetails['genres'][0]['name']; ?></p>
                    </div>
                    <div class="info">
                        <h2>Rating:</h2>
                        <p><?php echo $gameDetails['esrb_rating']['name']; ?></p>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
    <script src="./assets/js/script.js"></script>
</body>
</html>