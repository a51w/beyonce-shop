<?php
session_start(); // เริ่ม session

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบแล้วหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // ถ้ายังไม่ได้เข้าสู่ระบบ ให้ส่งไปหน้า login
    exit();
}

$username = $_SESSION['username']; // รับ username จาก session

$host = 'db';
$db = 'user_db';
$user = 'user';
$pass = '1234';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลของผู้ใช้จากฐานข้อมูล
$sql = "SELECT fullname, username, email FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $userData = $result->fetch_assoc();
    $fullname = $userData['fullname'];
    $email = $userData['email'];
} else {
    echo "❌ User not found.";
    exit();
}

$stmt->close();
$conn->close();
?>