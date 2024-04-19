<?php
// กำหนดค่าสำหรับการเชื่อมต่อฐานข้อมูล
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
// รับข้อมูลจากฟอร์มลงทะเบียน
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password']; // โปรดทราบว่าต้องมีการเข้ารหัสรหัสผ่านก่อนเก็บลงในฐานข้อมูล
$gender = $_POST['gender'];
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
echo "Gender: $gender<br>";
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
$sql = "INSERT INTO employee (firstName, lastName, email, password, gender, birthday, phoneNumber, houseNumber, street, district, subdistrict, province, zipcode, salary)
VALUES ('$firstName', '$lastName', '$email', '$password', '$gender', '$birthday', '$phoneNumber', '$houseNumber', '$street', '$district', '$subdistrict', '$province', '$zipcode', '$salary')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
