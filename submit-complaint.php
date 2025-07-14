<?php
$host = "localhost";
$dbname = "GCS";
$user = "root";
$pass = getenv('DB_PASSWORD');
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO complaints (title, city, panchayati_level, department_name, person_name, dept_num,
    address, complaint_title, complaint_date, complaint_description, user_name, phone, aadhar, pan)
            VALUES (:title, :city, :panchayati_level, :department_name, :person_name, :dept_num,
        :address, :complaint_title, :complaint_date, :complaint_description, :user_name, :phone, :aadhar, :pan)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':title' => $_POST['titlename'],
        ':city' => $_POST['city'],
        ':panchayati_level' => $_POST['panchayati_level'],
        ':department_name' => $_POST['department_name'],
        ':person_name' => $_POST['person_name'],
        ':dept_num' => $_POST['dept_num'],
        ':address' => $_POST['address'],
        ':complaint_title' => $_POST['complaint_title'],
        ':complaint_date' => $_POST['complaint_date'],
        ':complaint_description' => $_POST['complaint_description'],
        ':user_name' => $_POST['user_name'],
        ':phone' => $_POST['phone'],
        ':aadhar' => $_POST['aadhar'],
        ':pan' => $_POST['pan']
    ]);
    header("Location: index.php ");
    exit();
} else {
    // Redirect to the form page if accessed directly
    header("Location: complaint.html");
    exit();
}
?>
