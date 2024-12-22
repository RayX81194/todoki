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
</head>
<body>
    <h1>Sign Up</h1>
    <form action="signup.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
<?php
include("components/footer.php");
?>
