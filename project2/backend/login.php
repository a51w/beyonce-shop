<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่า username และ password จากฟอร์ม
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // ค้นหาผู้ใช้ในฐานข้อมูล (เช็ค username เท่านั้น)
    $stmt = $pdo->prepare("SELECT * FROM users WHERE name = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        // เปรียบเทียบ password (plain text หรือ hash ก็ได้ แต่ควร hash)
        // ถ้าคุณยังเก็บ plain text password ใช้แบบนี้
        if ($password === $user['password']) {
            // Login สำเร็จ → สร้าง session แล้ว redirect
            $_SESSION['username'] = $user['name'];
            header('Location: dashboard.php');
            exit();
        } else {
            echo "❌ Invalid password.";
        }
    } else {
        echo "❌ User not found.";
    }
} else {
    echo "Invalid request.";
}
?>
