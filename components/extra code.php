                <?php foreach ($games as $game): ?>
                    <div class="trend-card">
                        <img src="<?php echo $game['background_image']; ?>" alt="<?php echo $game['name']; ?>">
                        <div class="card-info">
                            <span><?php echo substr($game['released'], 0, 4); ?></span>
                            <h2><?php echo $game['name']; ?></h2>
                        </div>
                    </div>
                <?php endforeach; ?>


// Replace 'YOUR_API_KEY' with your actual RAWG API key
$apiKey = 'eb60a4cf05bc40a09666b54f1647d74c';
$url = 'https://api.rawg.io/api/games?key=' . $apiKey . '&dates=2019-01-01,2023-12-31&ordering=-added   ';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response, true);
$games = $result['results'];