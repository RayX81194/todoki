<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoki</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.svg">
    <link href="./assets/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <?php include("components/navbar.php"); ?>

    <div class="container">
        <header>
            <div class="intro">
                <h1 class="headlines">Never Forget Any Game Again</h1>
                <p class="descriptions">Explore a vast library of games, view detailed information, and track your favorites effortlessly in one convenient platform.</p>
            </div>
            <div class="links">
                <a href="login.php"><button class="logins">Login</button></a>
                <a href="signup.php"><button class="signups">Sign Up</button></a>
            </div>
            <div class="images">
                <img class="header-img" src="assets/header.png" alt="Header Image">
            </div>
        </header>

        <main>
            <section class="features">
                <div class="feature">
                    <img src="assets/Database.svg" alt="Feature 1">
                    <h1>Powered by IGDB</h1>
                    <p>Access game information powered by the extensive and trusted IGDB database.</p>
                </div>
                <div class="feature">
                    <img src="assets/List.svg" alt="Feature 1">
                    <h1>Track Your Games</h1>
                    <p>Keep an organized list of your favorite games and track your progress effortlessly.</p>
                </div>
                <div class="feature">
                    <img src="assets/Search.svg" alt="Feature 1">
                    <h1>Find the Game</h1>
                    <p>Quickly search and discover games from a vast collection across various genres and platforms.</p>
                </div>
                <div class="feature">
                    <img src="assets/View.svg" alt="Feature 1">
                    <h1>View Details</h1>
                    <p>Dive into detailed game insights, including reviews, trailers, and essential statistics.</p>
                </div>
                <div class="feature">
                    <img src="assets/feature.svg" alt="Feature 1">
                    <h1>Featured Games</h1>
                    <p>Explore trending, upcoming, and top-rated games curated for you.</p>
                </div>
                <div class="feature">
                    <img src="assets/random.svg" alt="Feature 1">
                    <h1>Randomizer</h1>
                    <p>Not sure what to play? Get random game suggestions to spark your next adventure.</p>
                </div>
                </div>
            </section>
        </main>
    </div>

    <?php include("components/footer.php"); ?>
</body>
</html>