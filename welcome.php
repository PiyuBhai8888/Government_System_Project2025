<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php"); // or any logged-in page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="css/welcome.css">
</head>
<body>
    <section class="section_welcome">
        <div class="wel_part1">
            <h1>Welcome to <br>Digital India Mission</h1>
            <p>India has seen a dream of Digital India. From latest science to latest technology, Everything should be
                available at the tip of one's finger</p>
            <a href="login.php" class="button">Login</a>
            <a href="registration.php" class="button">Registration</a>
        </div>
        <div class="wel_part2">
            <img src="image/Digital_India.jpg" alt="Digital India" class="welcome_image">
        </div>
    </section>
    <script src="js/welcome.js"></script>
</body>
</html>
