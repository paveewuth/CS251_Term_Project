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


// เตรียมคำสั่ง SQL สำหรับการเพิ่มข้อมูล
$sql = "INSERT INTO employee (firstName, lastName, email, password, sex, birthday, phoneNumber, houseNumber, street, district, subdistrict, province, zipcode, salary)
VALUES ('$firstName', '$lastName', '$email', '$password', '$sex', '$birthday', '$phoneNumber', '$houseNumber', '$street', '$district', '$subdistrict', '$province', '$zipcode', '$salary')";

if ($conn->query($sql) === TRUE) {
/////////////////////////////////////////////// เด่วต้องถามอั้ยหยาาา ///////////////////////////
  $userID = $conn->insert_id;
      // เพิ่มข้อมูลลงในตาราง category
      $category_staff = "INSERT INTO category (bookID, Category) VALUES ('$userID', '$categoryString')";
      $conn->query($category_sql);

  // เพิ่มข้อมูลลงในตาราง author
  $author_manger = "INSERT INTO author (bookID, Author) VALUES ('$userID', '$author')";
  $conn->query($author_sql);

  $_SESSION['userID'] = $conn->insert_id; // เก็บค่า userID ที่ได้จากการเพิ่มข้อมูลล่าสุด
  header("Location: ../html/signin.html");
  exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
