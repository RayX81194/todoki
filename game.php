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
    <link href="./assets/css/game.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        *{
            font-family: "Space Grotesk", serif;
        }
        body {
            background-color: #181717;
            color: white;
            margin: 0 2.5rem;
        }
        .game-details {
            margin: 2rem 0;
            padding: 0 2rem;
        }
        .game-details img {
            width: 100%;
            height: auto;
        }
        .game-info {
            margin-top: 1rem;
        }
        .game-info h1 {
            font-size: 2rem;
            font-weight: 700;
        }
        .game-info p {
            font-size: 1rem;
            margin: 1rem 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include("components/logged_navbar.php"); ?>

    <!-- Main Content -->
    <section class="game-details">
        <img src="<?php echo $gameDetails['background_image']; ?>" alt="<?php echo $gameDetails['name']; ?>">
        <div class="game-info">
            <h1><?php echo $gameDetails['name']; ?></h1>
            <p><strong>Released:</strong> <?php echo $gameDetails['released']; ?></p>
            <p><strong>Rating:</strong> <?php echo $gameDetails['rating']; ?> / 5</p>
            <p><?php echo $gameDetails['description_raw']; ?></p>
        </div>
    </section>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
    <script src="./assets/js/script.js"></script>
</body>
</html>