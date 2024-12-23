<?php 
    include("helpers/_dbconnect.php"); 
   
if  ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hash')";
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
    <div class="px-[30rem] mx-10 bg-[#160F0F]">
        <form class="flex flex-col text-center align-center justify-center" action="signup.php" method="post">
            <input type="text" id="name" name="name" placeholder="Your Name" required>        
            <input type="email" id="email" name="email" placeholder="Email" required>        
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>

    <!-- Footer -->
    <?php include("components/footer.php"); ?>
</body>
</html>

