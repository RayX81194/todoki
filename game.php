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

$config = require './helpers/config.php';
$apiKey = $config['rawg_api_key'];
$gameId = $_GET['id'];

// Fetch game details
$gameUrl = 'https://api.rawg.io/api/games/' . $gameId . '?key=' . $apiKey;
$ch = curl_init($gameUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$gameResponse = curl_exec($ch);
curl_close($ch);
$gameDetails = json_decode($gameResponse, true);

// Fetch game screenshots
$screenshotsUrl = 'https://api.rawg.io/api/games/' . $gameId . '/screenshots?key=' . $apiKey;
$ch = curl_init($screenshotsUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$screenshotsResponse = curl_exec($ch);
curl_close($ch);
$screenshots = json_decode($screenshotsResponse, true)['results'];

// Check for PC requirements
$pcRequirements = null;
foreach ($gameDetails['platforms'] as $platform) {
    if ($platform['platform']['name'] === 'PC') {
        $pcRequirements = $platform['requirements'];
        break;
    }
}

// Fetch user ratings
$ratings = [
    'exceptional' => 0,
    'recommended' => 0,
    'meh' => 0,
    'skip' => 0
];
if (isset($gameDetails['ratings'])) {
    foreach ($gameDetails['ratings'] as $rating) {
        switch ($rating['title']) {
            case 'exceptional':
                $ratings['exceptional'] = $rating['percent'];
                break;
            case 'recommended':
                $ratings['recommended'] = $rating['percent'];
                break;
            case 'meh':
                $ratings['meh'] = $rating['percent'];
                break;
            case 'skip':
                $ratings['skip'] = $rating['percent'];
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $gameDetails['name']; ?> - Todoki</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.svg">
    <link href="./assets/css/game.css?v=5" rel="stylesheet">
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
                <h1 class="game-title"><?php echo $gameDetails['name']; ?></h1>
                <div class="game-stats">
                    <div class="stats">
                        <img src="./assets/calendar.svg" alt="Calendar Icon" style="width: 20px; height: 20px;">
                        <span>Released:</span>
                        <p><?php echo $gameDetails['released']; ?></p>
                    </div>
                    <div class="stats">
                        <img src="./assets/star.svg" alt="Star Icon" style="width: 20px; height: 20px;">
                        <span>Rating:</span>
                        <p> <?php echo $gameDetails['rating']; ?> / 5</p>
                    </div>
                    <div class="stats">
                        <img src="./assets/game.svg" alt="Hourglass Icon" style="width: 20px; height: 20px;">
                        <span>Playtime:</span>
                        <p><?php echo $gameDetails['playtime']; ?> hours</p>
                    </div>
                    <div class="stats">
                        <img src="./assets/monitor.svg" alt="Platform Icon" style="width: 20px; height: 20px;">
                        <span>Platforms:</span>
                        <p>
                            <?php
                            foreach ($gameDetails['platforms'] as $platform) {
                                echo $platform['platform']['name'] . ", ";
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="game-description">
                    <?php echo $gameDetails['description']; ?>
                </div>
                <p class="tags">Tags:
                <span class="tag-list">
                    <?php
                    foreach ($gameDetails['tags'] as $tag) {
                        echo $tag['name'] . ", ";
                    }
                    ?>
                </span>
                </p>
            </div>
            <div class="additional-info">
    <div class="game-image">
        <img src="<?php echo $gameDetails['background_image']; ?>" alt="<?php echo $gameDetails['name']; ?>">
    </div>
    <a href="<?php echo $gameDetails['website']; ?>" target="_blank" class="btn"><img src="./assets/arr_right.png" alt="Website Icon" style="rotate: 180deg;">Visit Website</a>
    <div class="dev-info">
        <div class="info">
            <span>Developer:</span>
            <p><?php echo isset($gameDetails['developers'][0]['name']) ? $gameDetails['developers'][0]['name'] : '-'; ?></p>
        </div>
        <div class="info">
            <span>Publisher:</span>
            <p><?php echo isset($gameDetails['publishers'][0]['name']) ? $gameDetails['publishers'][0]['name'] : '-'; ?></p>
        </div>
        <div class="info">
            <span>Genre:</span>
            <p>
                <?php
                $genres = array_map(function($genre) {
                    return $genre['name'];
                }, $gameDetails['genres']);
                echo !empty($genres) ? implode(', ', array_slice($genres, 0, -1)) . (count($genres) > 1 ? ", " : "") . end($genres) : '-';
                ?>
            </p>
        </div>
        <div class="info">
            <span>ESRB Rating:</span>
            <p><?php echo isset($gameDetails['esrb_rating']['name']) ? $gameDetails['esrb_rating']['name'] : '-'; ?></p>
        </div>
    </div>
</div>
        </section>

        <section class="game-screenshots">
            <h1>Screenshots</h1>
            <div class="screenshots">
                <?php foreach ($screenshots as $screenshot): ?>
                    <img src="<?php echo $screenshot['image']; ?>" alt="Screenshot" onclick="openModal('<?php echo $screenshot['image']; ?>')">
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <!-- Modal for viewing screenshots -->
    <div id="screenshotModal" class="modal">
        <button class="close" onclick="closeModal()"><img src="./assets/close.svg" alt="Close Icon" style="width: 25px; height: 25px;"></button>
        <img id="modalImage" src="" alt="Screenshot">
    </div>

    <?php if ($pcRequirements): ?>
    <section class="game-requirements">
        <h1>System Requirements (PC)</h1>
        <div class="requirements">
            <?php if (isset($pcRequirements['minimum'])): ?>
            <div class="requirement">
                <p><?php echo nl2br($pcRequirements['minimum']); ?></p>
            </div>
            <?php endif; ?>
            <?php if (isset($pcRequirements['recommended'])): ?>
            <div class="requirement">
                <p><?php echo nl2br($pcRequirements['recommended']); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <section class="ratings">
    <h1>User Ratings</h1>
    <div class="rating">
        <div class="rating-info">
            <span>Exceptional:</span>
            <div class="bar-container">
                <div class="bar exceptional" style="width: <?php echo $ratings['exceptional']; ?>%;"></div>
                <div class="bar-background"></div>
            </div>
            <span class="percentage"><?php echo $ratings['exceptional']; ?>%</span>
        </div>
        <div class="rating-info">
            <span>Recommended:</span>
            <div class="bar-container">
                <div class="bar recommended" style="width: <?php echo $ratings['recommended']; ?>%;"></div>
                <div class="bar-background"></div>
            </div>
            <span class="percentage"><?php echo $ratings['recommended']; ?>%</span>
        </div>
        <div class="rating-info">
            <span>Meh:</span>
            <div class="bar-container">
                <div class="bar meh" style="width: <?php echo $ratings['meh']; ?>%;"></div>
                <div class="bar-background"></div>
            </div>
            <span class="percentage"><?php echo $ratings['meh']; ?>%</span>
        </div>
        <div class="rating-info">
            <span>Skip:</span>
            <div class="bar-container">
                <div class="bar skip" style="width: <?php echo $ratings['skip']; ?>%;"></div>
                <div class="bar-background"></div>
            </div>
            <span class="percentage"><?php echo $ratings['skip']; ?>%</span>
        </div>
    </div>
</section>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
    <script src="./assets/js/script.js"></script>
    <script>
        function openModal(imageSrc) {
            const modal = document.getElementById('screenshotModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageSrc;
            modal.style.display = 'flex';
        }

        function closeModal() {
            const modal = document.getElementById('screenshotModal');
            modal.style.display = 'none';
        }
    </script>
</body>
</html>