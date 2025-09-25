<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    http_response_code(500);
    echo json_encode(["success" => false, "error" => "Server error: $errstr"]);
    exit();
});

set_exception_handler(function ($exception) {
    http_response_code(500);
    echo json_encode(["success" => false, "error" => "Server exception: " . $exception->getMessage()]);
    exit();
});

session_start();
header("Content-Type: application/json");

if (!isset($_SESSION['username'])) {
    echo json_encode(["success" => false, "error" => "Not logged in"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);
$address = $data['address'] ?? null;

if (!$address) {
    echo json_encode(["success" => false, "error" => "No address provided"]);
    exit();
}

$conn = new mysqli("project-db-1", "root", "1234", "user_db");

if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Database connection failed: " . $conn->connect_error]);
    exit();
}

$username = $_SESSION['username'];
$sql = "INSERT INTO addresses (username, address) VALUES (?, ?)
        ON DUPLICATE KEY UPDATE address = VALUES(address)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(["success" => false, "error" => "SQL prepare failed: " . $conn->error]);
    exit();
}

$stmt->bind_param("ss", $username, $address);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => "Failed to save address: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>