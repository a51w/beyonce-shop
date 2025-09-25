<?php
header('Content-Type: application/json');
include 'db_connection.php';

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
}

// ดึงข้อมูลยอดขายรายเดือนจากฐานข้อมูล
$sql = "SELECT month, SUM(sales) AS total_sales 
        FROM monthly_sales 
        GROUP BY month 
        ORDER BY FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June')";
$result = $conn->query($sql);

if (!$result) {
    die(json_encode(["success" => false, "message" => "SQL error: " . $conn->error]));
}

$data = ["labels" => [], "sales" => []];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data["labels"][] = $row["month"];
        $data["sales"][] = $row["total_sales"];
    }
} else {
    // กรณีไม่มีข้อมูลในตาราง
    $data["message"] = "No sales data found.";
}

echo json_encode($data);
$conn->close();
?>