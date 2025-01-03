<p><strong>Playtime:</strong> <?php echo $gameDetails['playtime']; ?> hours</p>

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
                        <h2>Rating:</h2>
                        <p><?php echo $gameDetails['esrb_rating']['name']; ?></p>
                    </div>
                    </div>
                </div>