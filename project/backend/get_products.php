<?php
// นำเข้าไฟล์ db_connection.php เพื่อเชื่อมต่อฐานข้อมูล
include 'db_connection.php';

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
}

// ดึงข้อมูลสินค้าทั้งหมดจากฐานข้อมูล
$sql = "SELECT product_id, product_name, price, stock FROM products";
$result = $conn->query($sql);

if (!$result) {
    die(json_encode(["success" => false, "message" => "SQL error: " . $conn->error]));
}

if ($result->num_rows > 0) {
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // ส่งข้อมูลกลับในรูปแบบ JSON
    header('Content-Type: application/json');
    echo json_encode($products);
} else {
    // กรณีไม่มีสินค้าในฐานข้อมูล
    echo json_encode([]);
}

// ปิดการเชื่อมต่อ
$conn->close();
?>