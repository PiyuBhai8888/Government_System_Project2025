<?php
session_start();

// Database connection
$host = "localhost";
$dbname = "GCS";
$user = "root";
$pass = getenv('DB_PASSWORD');// Add your DB password if needed

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadhaar = $_POST['aadhaar_number'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE addharcard_Number = ?");
    $stmt->bind_param("s", $aadhaar);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $aadhaar;
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid Aadhaar number or password.";
        }
    } else {
        $error = "Invalid Aadhaar number or password.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login">
        <form method="POST" action="" id="loginForm">
            <h1>Login Page</h1>

            <?php if ($error): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <label for="aadhaar_number"><b>Aadhaar Number</b></label>
            <input type="text" name="aadhaar_number" required><br><br>

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" required><br><br>

            <button><a href="index.php">Submit</a></button>

            <div class="for_login">
                <span class="psw">Forgot <a href="forget_password.php">Password?</a></span><br><br>
                <span class="signup">Don't have an account? <a href="registration.php">Register</a></span>
            </div>
        </form>
    </div>
</body>
</html>
