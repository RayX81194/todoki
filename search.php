<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

// Check if search query is provided
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Replace 'YOUR_API_KEY' with your actual RAWG API key
$apiKey = 'eb60a4cf05bc40a09666b54f1647d74c';
$searchResults = [];

if ($searchQuery) {
    // Fetch search results
    $searchUrl = 'https://api.rawg.io/api/games?key=' . $apiKey . '&search=' . urlencode($searchQuery) . '&page_size=10';
    $ch = curl_init($searchUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $searchResponse = curl_exec($ch);
    curl_close($ch);
    $searchResult = json_decode($searchResponse, true);
    $searchResults = $searchResult['results'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Todoki</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.svg">
    <link href="./assets/css/search.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <!-- Navbar -->
    <?php include("components/logged_navbar.php"); ?>

    <!-- Main Content -->
    <section class="search-container">
        <h1>Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h1>
        <div class="search-results">
            <?php if (empty($searchResults)): ?>
                <p>No results found.</p>
            <?php else: ?>
                <?php foreach ($searchResults as $game): ?>
                    <div class="search-card">
                        <a href="game.php?id=<?php echo $game['id']; ?>">
                        <img src="<?php echo $game['background_image']; ?>" alt="<?php echo $game['name']; ?>">
                        <div class="card-info">
                            <span><?php echo substr($game['released'], 0, 4); ?></span>
                            <h2><?php echo $game['name']; ?></h2>
                        </div>
                        </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
    <script src="./assets/js/script.js"></script>
</body>
</html>