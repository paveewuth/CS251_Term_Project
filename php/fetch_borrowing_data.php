<?php
// เชื่อมต่อกับฐานข้อมูล
require_once('db_connection.php');

// คำสั่ง SQL สำหรับดึงข้อมูลการยืมหนังสือ
$sql = "SELECT * FROM borrowing";

// ดึงข้อมูลจากฐานข้อมูล
$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($result->num_rows > 0) {
    $data = array();

    // วนลูปเพื่อเก็บข้อมูลในรูปแบบของ associative array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // ส่งข้อมูลในรูปแบบ JSON
    echo json_encode($data);
} else {
    echo "No data found";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
