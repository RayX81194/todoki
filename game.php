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
    <link href="./assets/css/game.css?v=2" rel="stylesheet">
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
                <p><strong>Released:</strong> <?php echo $gameDetails['released']; ?></p>
                <p><strong>Rating:</strong> <?php echo $gameDetails['rating']; ?> / 5</p>
                <p><?php echo $gameDetails['description_raw']; ?></p>
            </div>
            <div class="additional-info">
                <div class="game-image">
                    <img src="<?php echo $gameDetails['background_image']; ?>" alt="<?php echo $gameDetails['name']; ?>">
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
    <script src="./assets/js/script.js"></script>
</body>
</html>