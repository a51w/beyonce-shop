<?php
$servername = "mysql-container"; // ถ้าใช้ Docker ให้ใช้ชื่อ container mysql
$username = "root";
$password = "your_mysql_password"; // เปลี่ยนตามจริง
$dbname = "shop_db"; // เปลี่ยนตามจริง

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$fullname = $_POST['fullname'];
$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$confirm_pass = $_POST['confirm_password'];

// ตรวจสอบการยืนยันรหัสผ่าน
if ($pass !== $confirm_pass) {
    die("Passwords do not match. <a href='register.html'>Go back</a>");
}

// แฮชรหัสผ่าน
$hash = password_hash($pass, PASSWORD_DEFAULT);

// คำสั่ง SQL สำหรับการบันทึกข้อมูลผู้ใช้ใหม่
$sql = "INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $fullname, $user, $email, $hash);

// ประมวลผลคำสั่ง SQL
if ($stmt->execute()) {
    echo "Registration successful. <a href='login.html'>Login here</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
