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
    </section>