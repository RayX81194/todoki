<?php 
    include("helpers/_dbconnect.php"); 
   
if  ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hash')";
    $result = mysqli_query($conn, $sql);


    if ($result) {
       header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoki - Sign Up</title>
    <link href="./src/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        *{
            font-family: "Space Grotesk", serif;
        }
    </style>
</head>
<body class="bg-[#181717] text-white">
    <!-- Navbar -->
    <?php include("components/navbar.php"); ?>

    <!-- Main Content -->
    <div class="container w-1/2 bg-">
        <form action="signup.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>        
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
</body>
</html>

