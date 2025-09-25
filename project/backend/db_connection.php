<?php
// กำหนดข้อมูลการเชื่อมต่อ
$servername = "localhost"; // หรือ IP ของ MySQL Server
$username = "root"; // ชื่อผู้ใช้ MySQL
$password = "1234"; // รหัสผ่าน MySQL
$dbname = "user_db"; // ชื่อฐานข้อมูลที่ต้องการเชื่อมต่อ

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}

// ตรวจสอบว่าตาราง products มีอยู่หรือไม่
$tableCheck = $conn->query("SHOW TABLES LIKE 'products'");
if ($tableCheck->num_rows == 0) {
    die(json_encode(["success" => false, "message" => "Table 'products' does not exist."]));
}

// ทดสอบการดึงข้อมูลจากตาราง products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if (!$result) {
    die(json_encode(["success" => false, "message" => "SQL error: " . $conn->error]));
}

$data = ["success" => true, "products" => []];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data["products"][] = $row;
    }
} else {
    $data["message"] = "No products found.";
}

// ส่งข้อมูลกลับในรูปแบบ JSON
echo json_encode($data);

// ปิดการเชื่อมต่อ
$conn->close();
?>
