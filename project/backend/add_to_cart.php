<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];

// เพิ่มเข้า cart
$item = array(
    'product_id' => $product_id,
    'product_name' => $product_name,
    'price' => $price,
    'quantity' => 1
);

// ตรวจสอบว่าซ้ำไหม
$found = false;
foreach ($_SESSION['cart'] as &$cart_item) {
    if ($cart_item['product_id'] == $product_id) {
        $cart_item['quantity']++;
        $found = true;
        break;
    }
}
if (!$found) {
    $_SESSION['cart'][] = $item;
}

// ย้อนกลับไปหน้าหลัก
header("Location: cart.php");
exit();
?>
