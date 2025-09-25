<?php
$servername = "db";
$username = "root";
$password = "1234";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username']; // เพิ่มรับค่า username

$sql = "INSERT INTO users (fullname, email, username) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $fullname, $email, $username);

if ($stmt->execute()) {
    echo "บันทึกข้อมูลสำเร็จ!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
