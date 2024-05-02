<?php
session_start();
require_once('../php/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = mysqli_real_escape_string($conn, $_POST['userID']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $houseNumber = mysqli_real_escape_string($conn, $_POST['houseNumber']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $subdistrict = mysqli_real_escape_string($conn, $_POST['subdistrict']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);

    $sql = "UPDATE employee SET 
            firstName='$firstName', 
            lastName='$lastName', 
            sex='$sex', 
            birthday='$birthday', 
            phoneNumber='$phoneNumber', 
            email='$email', 
            houseNumber='$houseNumber', 
            street='$street', 
            subdistrict='$subdistrict', 
            district='$district', 
            province='$province', 
            zipcode='$zipcode' 
            WHERE UserID='$userID'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: ../html/staffprofile.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}
?>
