<?php
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
?>