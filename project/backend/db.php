<?php
$servername = "db";  // ชื่อ service ใน docker-compose
$username = "user";  // ชื่อผู้ใช้จาก environment
$password = "1234";  // รหัสผ่านจาก environment
$dbname = "user_db"; // ชื่อฐานข้อมูลที่ตั้งใน environment

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
