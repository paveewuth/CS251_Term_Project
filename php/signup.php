<?php
session_start();
require_once('db_connection.php');

// รับข้อมูลจากฟอร์มลงทะเบียน
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password']; // โปรดทราบว่าต้องมีการเข้ารหัสรหัสผ่านก่อนเก็บลงในฐานข้อมูล
$sex = $_POST['sex'];
$birthday = $_POST['birthday'];
$phoneNumber = $_POST['phoneNumber'];
$houseNumber = $_POST['houseNumber'];
$street = $_POST['street'];
$district = $_POST['district'];
$subdistrict = $_POST['subdistrict'];
$province = $_POST['province'];
$zipcode = $_POST['zipcode'];
$salary = $_POST['salary'];

// Echoing the received data
echo "First Name: $firstName<br>";
echo "Last Name: $lastName<br>";
echo "Email: $email<br>";
echo "sex: $sex<br>";
echo "Birthday: $birthday<br>";
echo "Phone Number: $phoneNumber<br>";
echo "House Number: $houseNumber<br>";
echo "Street: $street<br>";
echo "District: $district<br>";
echo "Subdistrict: $subdistrict<br>";
echo "Province: $province<br>";
echo "Zipcode: $zipcode<br>";
echo "Salary: $salary<br>";

// เตรียมคำสั่ง SQL สำหรับการเพิ่มข้อมูล
$sql = "INSERT INTO employee (firstName, lastName, email, password, sex, birthday, phoneNumber, houseNumber, street, district, subdistrict, province, zipcode, salary)
VALUES ('$firstName', '$lastName', '$email', '$password', '$sex', '$birthday', '$phoneNumber', '$houseNumber', '$street', '$district', '$subdistrict', '$province', '$zipcode', '$salary')";

if ($conn->query($sql) === TRUE) {
  $_SESSION['userID'] = $conn->insert_id; // เก็บค่า userID ที่ได้จากการเพิ่มข้อมูลล่าสุด
  header("Location: display2.php");
  exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
