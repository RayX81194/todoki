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
    <style>
        *{
            font-family: "Space Grotesk", serif;
        }
        body {
            background-color: #181717;
            color: white;
            margin: 0 2.5rem;
        }
        .search-container {
            margin: 2rem 0;
            padding: 0 2rem;
        }
        .search-results {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .search-card {
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
        }
        .search-card img {
            width: 100%;
            height: auto;
            transition: .3s ease-in-out;
        }
        .card-info {
            padding: 10px;
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


    <!-- Footer -->
    <?php include("components/footer.php"); ?>
    <script src="./assets/js/script.js"></script>
</body>
</html>