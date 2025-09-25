<?php
// กำหนดข้อมูลการเชื่อมต่อ
$servername = "172.20.0.2"; // IP ของ MySQL container
$username = "root"; // ชื่อผู้ใช้ MySQL
$password = "1234"; // รหัสผ่าน MySQL
$dbname = "beyonce_shop"; // ชื่อฐานข้อมูลที่ต้องการเชื่อมต่อ

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
