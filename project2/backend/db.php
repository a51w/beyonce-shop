<?php
$host = 'localhost';
$db = 'shop_db';
$user = 'root';  // ใช้ตามที่ตั้งค่าไว้
$password = '1234';  // ใส่รหัสผ่าน MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
