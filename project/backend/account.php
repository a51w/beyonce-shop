<?php
session_start(); // ต้องอยู่บนสุด

header('Content-Type: application/json');

// เช็ค session
if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'not_logged_in']);
    exit();
}

// เชื่อมต่อฐานข้อมูล
$host = "db";
$dbUsername = "root";
$dbPassword = "1234";
$dbName = "user_db";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    echo json_encode(['error' => 'db_connection_failed']);
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

echo json_encode([
    "fullname" => $userData['fullname'],
    "username" => $userData['username'],
    "email" => $userData['email'],
    "address" => $userData['address']
]);

$stmt->close();
$conn->close();
?>
