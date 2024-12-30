<?php 
    include("helpers/_dbconnect.php"); 

    $err = false;
   
if  ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $checkEmailSql = "SELECT * FROM users WHERE email='$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailSql);
    $emailCount = mysqli_num_rows($checkEmailResult);

    if ($emailCount > 0) {
        $err = "An account with this email already exists!";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hash')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
           header("Location: home.php");
        } else {
            $err = "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoki - Sign Up</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.svg">
    <link href="./assets/css/signup.css?v=3" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <!-- Navbar -->
    <?php include("components/navbar.php"); ?>

    <!-- Main Content -->
    <div class="container">
        <section class="signup-section">
            <h1 class="create-account">Create an Account</h1>
            <?php 
            if($err){
                echo "
                <div class='err'>
                    <img src='assets/Info.svg'>
                    <p>$err</p>
                </div>";
            }
            ?>
            <form action="signup.php" method="post">
                <input type="text" id="name" name="name" placeholder="Your Name" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="password" name="password" placeholder="Password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <p class="password-requirements">Password should have:</p>
                <ul>
                    <li>At least 8 characters or more.</li>
                    <li>A uppercase character and a lowercase character.</li>
                    <li>At least a number.</li>
                </ul>
                <button type="submit">Continue to Sign Up</button>
            </form>
            <div class="line">
                <p>Already have an account?</p>
                <a href="login.php"><p class="login">Log In</p></a>
                <p class="terms">By signing up, you agree to our Terms of Service and Privacy Policy. For information on how we utilize cookies, please refer to our Cookies Policy.
                </p>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
</body>
</html>

