<?php
$servername = "db";
$username = "root";
$password = "123456";
$dbname = "project_db";

// สร้าง connection
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบ connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$name = $_POST['name'];
$email = $_POST['email'];

// SQL insert
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "บันทึกข้อมูลสำเร็จ!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
