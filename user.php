<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoki - User Profile</title>
</head>
<body>
    <?php include("components/logged_navbar.php"); ?>

    <section class="user-profile">
        <h1>User Profile</h1>
        <p>This is the user profile page.</p>
        <p>Logged in as: <?php echo $_SESSION['username']; ?></p>
        <a href="logout.php">Logout</a>
    </section>

    <?php include("components/footer.php"); ?>
</body>
</html>