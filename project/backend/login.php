<?php
session_start();

// เชื่อมต่อฐานข้อมูล
$host = 'db';
$db = 'user_db';
$user = 'user';
$pass = '1234';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $userData = $result->fetch_assoc();
    if (password_verify($password, $userData['password'])) {
        
        // ตั้งค่าตัวแปร $_SESSION เพื่อเก็บข้อมูลของผู้ใช้
        $_SESSION['username'] = $userData['username'];
        $_SESSION['fullname'] = $userData['fullname'];
        $_SESSION['email'] = $userData['email'];
        $_SESSION['address'] = $userData['address']; // สมมุติว่า address อยู่ในตาราง `users`
        
        // ตรวจสอบว่าเป็นผู้ดูแลระบบหรือไม่
        if (substr($username, -6) === '.admin') {
            header("Location: index_admin.html");
        } else {
            header("Location: index_user.html");
        }
        exit();

    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ User not found. Please register first.";
}

$stmt->close();
$conn->close();
?>
