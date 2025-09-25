<?php
session_start();

// ตรวจสอบว่ามีการส่งข้อมูลมาจากฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ดึงข้อมูลจากฟอร์ม
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // ตรวจสอบว่าตะกร้าสินค้ามีสินค้าอยู่หรือไม่
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        die("Your cart is empty. Please add items to your cart before checking out.");
    }

    // คำนวณยอดรวม
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    $shipping = 50; // ค่าจัดส่ง
    $total = $subtotal + $shipping;

    // เชื่อมต่อฐานข้อมูล
    include 'db_connection.php';

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // บันทึกคำสั่งซื้อในฐานข้อมูล
    $sql = "INSERT INTO orders (full_name, email, phone, address, subtotal, shipping, total, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssddd", $fullName, $email, $phone, $address, $subtotal, $shipping, $total);

    if ($stmt->execute()) {
        // ดึง ID ของคำสั่งซื้อที่เพิ่งบันทึก
        $orderId = $stmt->insert_id;

        // บันทึกรายการสินค้าในคำสั่งซื้อ
        $sqlItems = "INSERT INTO order_items (order_id, product_id, product_name, price, quantity) VALUES (?, ?, ?, ?, ?)";
        $stmtItems = $conn->prepare($sqlItems);

        foreach ($_SESSION['cart'] as $item) {
            $stmtItems->bind_param("iisdi", $orderId, $item['product_id'], $item['product_name'], $item['price'], $item['quantity']);
            $stmtItems->execute();
        }

        // ล้างตะกร้าสินค้า
        unset($_SESSION['cart']);

        // แสดงข้อความยืนยันคำสั่งซื้อ
        echo "<h1>Thank you for your order!</h1>";
        echo "<p>Your order has been placed successfully.</p>";
        echo "<p>Order ID: <strong>#{$orderId}</strong></p>";
        echo "<a href='index_user.php'>Back to Home</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $stmt->close();
    $conn->close();
} else {
    // หากไม่ได้ส่งข้อมูลมาจากฟอร์ม
    header("Location: check_out.html");
    exit();
}
?>