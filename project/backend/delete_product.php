<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['productId'] ?? null;

    if (!$product_id) {
        echo json_encode(["success" => false, "message" => "Product ID is required"]);
        exit();
    }

    $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Product deleted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to delete product: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>