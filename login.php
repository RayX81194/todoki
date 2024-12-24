<?php
    include("helpers/_dbconnect.php");
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoki - Sign Up</title>
    <link href="./assets/css/signup.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <!-- Navbar -->
    <?php include("components/navbar.php"); ?>

    <!-- Main Content -->
    <div class="container">
        <h1>Welcome Back!</h1>
        <form action="signup.php" method="post">
            <input type="text" id="name" name="name" placeholder="Your Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Continue to Sign Up</button>
        </form>
        <p>Already have an account?</p>
        <a href="login.php"><p class="login">Log In</p></a>
        <p class="terms">By signing up, you agree to our Terms of Service and Privacy Policy. For information on how we utilize cookies, please refer to our Cookies Policy.
        </p>
    </div>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
</body>
</html>