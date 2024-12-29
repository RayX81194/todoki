<?php
    include("helpers/_dbconnect.php");

    $err= false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["email"]) && isset($_POST["password"] )){
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num == 1){
                while($row = mysqli_fetch_assoc($result)){
                    if(password_verify($password, $row['password'])){
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $row['name'];

                        header("location: home.php");
                    }
                }

            } else {
                $err = "Your Email and Password are incorrect!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoki - Login</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.svg">
    <link href="./assets/css/login.css?v=2" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <!-- Navbar -->
    <?php include("components/navbar.php"); ?>

    <!-- Main Content -->
    <div class="container">
        <section class="login-section">
            <h1 class="welcome">Welcome Back!</h1>
            <?php 
            if($err){
                echo "
                <div class='err'>
                    <img src='assets/Info.svg'>
                    <p>$err</p>
                </div>";
            }
            ?>
            <form action="login.php" method="post">
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit">Continue to Login</button>
            </form>
            <div class="line">
                <p>Already have an account?</p>
                <a href="signup.php"><p class="signup">Create an Account</p></a>
                <p class="terms">By logging up, you agree to our Terms of Service and Privacy Policy. For information on how we utilize cookies, please refer to our Cookies Policy.
                </p>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
</body>
</html>