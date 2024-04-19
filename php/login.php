<?php
session_start();

// Database connection parameters
$servername = "localhost"; // เชื่อมต่อกับ MySQL ที่อยู่ในเครื่องเดียวกับ PHP
$username = "root"; // ชื่อผู้ใช้ MySQL
$password = ""; // รหัสผ่าน MySQL
$dbname = "database"; // ชื่อฐานข้อมูลที่คุณต้องการใช้


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Retrieve submitted username and password from the login form
$email = $_POST['email'];
$password = $_POST['password'];

echo "Email: " . $email . "<br>";
echo "Password: " . $password . "<br>";

// SQL query to check if the provided email and password match any record in the Employee table
$sql = "SELECT * FROM Employee WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['userID'] = $row['userID'];
    header("Location: ../Testing/display2.php");
    exit();
} else {
    // Login failed
    echo "Login failed";
}

// Close the database connection
$conn->close();
?>
