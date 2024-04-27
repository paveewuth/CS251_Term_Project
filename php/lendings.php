<?php

require_once('db_connection.php');

//สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูลการยืมหนังสือ
$sql = "INSERT INTO Lendings (book_id, book_price, customer_name, citizen_id, phone, start_date, return_date, email, is_member, total_price)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// ตรวจสอบการเตรียมคำสั่ง SQL
if ($stmt = $conn->prepare($sql)) {
    // กำหนดค่าแทนที่สำหรับแต่ละพารามิเตอร์
    $stmt->bind_param("iisdsssssd", $book_id, $book_price, $customer_name, $citizen_id, $phone, $start_date, $return_date, $email, $is_member, $total_price);

    // กำหนดค่าพารามิเตอร์
    $book_id = $_POST['book_id'];
    $book_price = $_POST['book_price'];
    $customer_name = $_POST['customer_name'];
    $citizen_id = $_POST['citizen_id'];
    $phone = $_POST['phone'];
    $start_date = $_POST['start_date'];
    $return_date = $_POST['return_date'];
    $email = $_POST['email'];
    $is_member = isset($_POST['member']) ? 1 : 0; // ถ้า checkbox ถูกติกแล้วเป็น 1 ถ้าไม่ติกเป็น 0
    $total_price = $_POST['total_price'];

    // ประมวลผลคำสั่ง SQL
    if ($stmt->execute()) {
        header("Location: ../html/index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // ปิดคำสั่ง SQL
    $stmt->close();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อกับฐานข้อมูล
$conn->close();
?>