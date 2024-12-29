<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoki</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.svg">
    <link href="./assets/css/index.css?" rel="stylesheet">
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
    </div>

    <?php include("components/footer.php"); ?>
</body>
</html>