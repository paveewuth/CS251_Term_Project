<?php
session_start();
// เชื่อมต่อกับฐานข้อมูล
require_once('db_connection.php');

// รับข้อมูลจากแบบฟอร์ม
$bookName = $_POST['bookname'];
$bookID = $_POST['bookid'];
$bookCover = $_POST['bookcover'];
$bookPrice = $_POST['bookprice'];
$author = $_POST['author'];
$category = $_POST['checkboxGroup']; // หมวดหมู่ของหนังสือ

// ตรวจสอบว่า $category เป็น array หรือไม่
if (!is_array($category)) {
    // ถ้าไม่ใช่ array ให้สร้าง array ที่มี $category เป็นสมาชิกเดียว
    $category = array($category);
}

// สร้าง string เพื่อเก็บหมวดหมู่ทั้งหมด โดยคั่นด้วย ,
$categoryString = implode(",", $category);

// เพิ่มข้อมูลลงในตาราง cartoonbook
$sql = "INSERT INTO cartoonbook (bookID, bookName, price, borrowCount, bookcover) VALUES ('$bookID', '$bookName', '$bookPrice', 0, '$bookCover')";
if ($conn->query($sql) === TRUE) {

    // เพิ่มข้อมูลลงในตาราง category
    $category_sql = "INSERT INTO category (bookID, Category) VALUES ('$bookID', '$categoryString')";
    $conn->query($category_sql);

    // เพิ่มข้อมูลลงในตาราง author
    $author_sql = "INSERT INTO author (bookID, Author) VALUES ('$bookID', '$author')";
    $conn->query($author_sql);

    // ตั้งค่า session
    $_SESSION['bookName'] = $bookName;
    $_SESSION['bookID'] = $bookID;
    $_SESSION['bookCover'] = $bookCover;
    $_SESSION['bookPrice'] = $bookPrice;
    $_SESSION['author'] = $author;
    $_SESSION['category'] = $category;

    // ส่งกลับไปยังหน้าที่สร้างเสร็จเรียบร้อย
    header("Location: ../html/addbookfinish.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
