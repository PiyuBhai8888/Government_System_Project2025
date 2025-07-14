<?php
// Start session
session_start();

// Database connection
$host = "localhost"; // or your database host
$dbname = "GCS";
$user= "pma";
$pass = getenv('DB_PASSWORD'); // Fetch password from environment variable

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = "";
$error = "";

// Handle form submission

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile_number'];
    $address = $_POST['address']; // Typo in HTML: should be 'address'
    $pan = $_POST['pan_number'];
    $aadhaar = $_POST['aadhaar_number'];
    $password = $_POST['Password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate: Passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if Aadhaar or Email already exists
        $checkStmt = $conn->prepare("SELECT * FROM users WHERE addharcard_Number = ? OR Email = ?");
        $checkStmt->bind_param("ss", $aadhaar, $email);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            $error = "User with this Aadhaar or Email already exists!";
        } else {
            // Insert into DB
            $stmt = $conn->prepare("INSERT INTO users (name, email, mobile_number, address, pan_number, addharcard_Number, password)
VALUES (?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssss", $name, $email, $mobile, $address, $pan, $aadhaar, $hashed_password);


            if ($stmt->execute()) {
                $success = "Registration successful.";
                header("Location: index.php");
            } else {
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $checkStmt->close();
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/registration.css">
</head>

<body>
    <div class="register">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h1>Registration</h1>

            <?php if ($success): ?>
                <p style="color: green;"><?php echo $success; ?></p>
            <?php elseif ($error): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <label for="name"><b>Name</b></label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email"><b>Email</b></label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="mobile_number"><b>Mobile Number</b></label>
            <input type="text" id="mobile_number" name="mobile_number" required><br><br>

            <label for="address"><b>Address</b></label>
            <input type="text" id="address" name="address"><br><br>

            <label for="pan_number"><b>PAN Card Number</b></label>
            <input type="text" id="pan_number" name="pan_number" required><br><br>

            <label for="aadhaar_number"><b>Aadhaar Number</b></label>
            <input type="text" id="aadhaar_number" name="aadhaar_number" required><br><br>

            <label for="password"><b>Password</b></label>
            <input type="password" id="password" name="Password" required><br><br>

            <label for="confirm_password"><b>Confirm Password</b></label>
            <input type="password" name="confirm_password" required><br><br>

            <button id="submit" type="submit" value="submit"><a href="index.php">Submit</a></button>
            <button type="reset" value="reset">Reset</button>
        </form>
    </div>

    <script src="js/registration.js"></script>
</body>
</html>
