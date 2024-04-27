<?php
session_start();

require_once('db_connection.php');
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
    header("Location: ../html/index.html");
    exit();
} else {
    // Login failed
    echo "Login failed";
}

// Close the database connection
$conn->close();
?>
