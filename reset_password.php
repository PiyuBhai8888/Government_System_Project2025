<?php
session_start();

if (!isset($_SESSION['reset_email'])) {
    header("Location: forget_password.php");
    exit();
}

$email = $_SESSION['reset_email'];
$host = "localhost"; // or your database host
$dbname = "GCS";
$user= "pma";
$pass = getenv('DB_PASSWORD'); // Fetch password from environment variable

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $message = "Passwords do not match!";
    } else {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE Email = ?");
        $stmt->bind_param("ss", $hashed_password, $email);
        if ($stmt->execute()) {
            unset($_SESSION['reset_email']);
            $message = "Password updated successfully. <a href='login.php'>Login here</a>.";
        } else {
            $message = "Failed to update password.";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/reset_password.css">
</head>
<body>
    <div class="container">
        <h1>Reset Password</h1>
        <?php if ($message): ?>
            <p style="color: <?php echo strpos($message, 'successfully') !== false ? 'green' : 'red'; ?>">
                <?php echo $message; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Update Password</button>
        </form>
    </div>
</body>
</html>
