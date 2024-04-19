<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['userID'])) {

    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM Employee WHERE UserID = '$userID';";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
}
?>
