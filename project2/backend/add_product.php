<?php
include 'db.php'; // เชื่อมต่อกับฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับข้อมูลจากฟอร์ม
    $product_id = $_POST['productId'];
    $product_name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $stock = $_POST['productStock'];

    // SQL สำหรับการเพิ่มข้อมูล
    $stmt = $pdo->prepare("INSERT INTO products (product_id, product_name, price, stock) VALUES (?, ?, ?, ?)");
    $stmt->execute([$product_id, $product_name, $price, $stock]);

    echo "Product added successfully!";
}
?>
