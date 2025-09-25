<?php
// dashboard.php

// เชื่อมต่อฐานข้อมูล MySQL
$servername = "localhost"; // หรือชื่อเซิร์ฟเวอร์ฐานข้อมูล
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูล
$password = ""; // รหัสผ่านฐานข้อมูล
$dbname = "your_database_name"; // ชื่อฐานข้อมูล

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT 
            (SELECT COUNT(*) FROM products) AS totalProducts,
            (SELECT COUNT(*) FROM orders WHERE DATE(order_date) = CURDATE()) AS ordersToday,
            (SELECT COUNT(*) FROM reviews WHERE status = 'pending') AS pendingReviews,
            (SELECT COUNT(*) FROM customers WHERE registration_date >= CURDATE()) AS newCustomers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // ส่งข้อมูลในรูป JSON
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode([]);
}

$conn->close();
?>
