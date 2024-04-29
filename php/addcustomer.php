<?php
session_start();
// เชื่อมต่อฐานข้อมูล
require_once('db_connection.php');

// รับค่าจากแบบฟอร์ม
$phoneNumber = $_POST['phone'];
$customerType = $_POST['customer_type'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$citizenID = $_POST['citizen_id'];

// เพิ่มข้อมูลลงในตาราง customer
$sql_customer = "INSERT INTO customer (phoneNumber, firstName, lastName, citizenID) 
                 VALUES ('$phoneNumber', '$firstName', '$lastName' , '$citizenID')";

if ($conn->query($sql_customer) === TRUE) {
    // ดึงค่า customerID ที่เพิ่มล่าสุด
    $customerID = $conn->insert_id;

    // สร้าง session สำหรับเก็บค่า customerID
    $_SESSION['customerID'] = $customerID;

    // ตรวจสอบว่าเป็น member หรือ not member
    if ($customerType === 'member') {
        $memStart = $_POST['memStart'];
        $memExp = $_POST['memExp'];

        // เพิ่มข้อมูลลงในตาราง member
        $sql_member = "INSERT INTO member (customerID, memStart, memExp) VALUES ('$customerID', '$memStart', '$memExp')";
        if ($conn->query($sql_member) === TRUE) {
            // ถ้าเพิ่มข้อมูลสำเร็จให้ redirect ไปยังหน้า customer.php
            header("Location: ../html/addcustomerfinish.php");
            exit();
        } else {
            // ถ้ามีข้อผิดพลาดในการเพิ่มข้อมูลในตาราง member ให้แสดงข้อความผิดพลาด
            echo "Error: " . $sql_member . "<br>" . $conn->error;
        }
    } else {
        // เพิ่มข้อมูลลงในตาราง general
        $sql_general = "INSERT INTO general (customerID) VALUES ('$customerID')";
        if ($conn->query($sql_general) === TRUE) {
            // ถ้าเพิ่มข้อมูลสำเร็จให้ redirect ไปยังหน้า customer.php
            header("Location: ../html/addcustomerfinish.php");
            exit();
        } else {
            // ถ้ามีข้อผิดพลาดในการเพิ่มข้อมูลในตาราง general ให้แสดงข้อความผิดพลาด
            echo "Error: " . $sql_general . "<br>" . $conn->error;
        }
    }
} else {
    // แสดงข้อผิดพลาดหากมีปัญหาในการเพิ่มข้อมูล
    echo "Error: " . $sql_customer . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อกับฐานข้อมูล
$conn->close();
?>
