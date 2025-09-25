<?php
header('Content-Type: application/json');
include 'db_connection.php';

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
}

// ดึงข้อมูลยอดขายตามประเภทสินค้า
$sql = "SELECT category, SUM(sales) AS total_sales FROM sales_data GROUP BY category";
$result = $conn->query($sql);

if (!$result) {
    die(json_encode(["success" => false, "message" => "SQL error: " . $conn->error]));
}

if ($result->num_rows > 0) {
    $data = ["categories" => [], "sales" => []];
    while ($row = $result->fetch_assoc()) {
        $data["categories"][] = $row["category"];
        $data["sales"][] = $row["total_sales"];
    }
    echo json_encode($data);
} else {
    echo json_encode(["categories" => [], "sales" => []]);
}

$conn->close();
?>