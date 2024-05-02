<?php
// เชื่อมต่อกับฐานข้อมูล
require_once('db_connection.php');

// รับข้อมูลจากแบบฟอร์ม (ข้อมูลที่ส่งมาเป็น JSON)
$data = json_decode(file_get_contents("php://input"), true);

// นำข้อมูล customerID และ bookID ที่ได้รับมา
$customerID = $data['customerID'];
$bookID = $data['bookID'];

// คำสั่ง SQL สำหรับลบแถวในตาราง borrowing
$sql = "DELETE FROM borrowing WHERE customerID = '$customerID' AND bookID = '$bookID'";

// ทำการลบแถว
if ($conn->query($sql) === TRUE) {
    echo "Row deleted successfully";
} else {
    echo "Error deleting row: " . $conn->error;
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
