<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['productName'] ?? null;
    $price = $_POST['productPrice'] ?? null;
    $stock = $_POST['productStock'] ?? null;

    if (!$product_name || !$price || !$stock) {
        echo json_encode(["success" => false, "message" => "All fields are required"]);
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO products (product_name, price, stock) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $product_name, $price, $stock);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Product added successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add product: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
