<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// เริ่มต้นตะกร้าสินค้าใน session ถ้ายังไม่มี
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// ตรวจสอบการเพิ่มสินค้าในตะกร้า
if (isset($_GET['add_to_cart'])) {
    $productId = $_GET['add_to_cart'];
    
    // ข้อมูลสินค้า
    $products = [
        'black-t-shirt' => [
            'id' => 'black-t-shirt',
            'name' => 'Classic Tee',
            'price' => 500,
            'image' => 'assets/black T.jpg'
        ],
        'denim-jacket' => [
            'id' => 'denim-jacket',
            'name' => 'Denim Jacket',
            'price' => 750,
            'image' => 'assets/Denim Jacket.jpg'
        ],
        'mini-dress' => [
            'id' => 'mini-dress',
            'name' => 'Mini Dress',
            'price' => 1200,
            'image' => 'assets/Mini Dress.jpg'
        ],
        'comfy-hoodie' => [
            'id' => 'comfy-hoodie',
            'name' => 'Comfy Hoodie',
            'price' => 950,
            'image' => 'assets/Comfy Hoodie.jpg'
        ]
    ];

    if (isset($products[$productId])) {
        $product = $products[$productId];
        $product['quantity'] = 1;
        $_SESSION['cart'][] = $product;
        
        header('Location: cart.php?added=1');
        exit();
    }
}

// นับจำนวนสินค้าในตะกร้า
$cartCount = count($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- ส่วน head เหมือนเดิม -->
</head>
<body>

  <!-- ส่วน header และ nav เหมือนเดิม -->

  <!-- ส่วนสินค้าแนะนำ -->
  <section id="products">
    <h2>Recommended Product</h2>
    <div class="product-list">
      <div class="product">
        <img src="assets/black T.jpg" alt="Classic Tee">
        <div class="product-content">
          <h3>Classic Tee</h3>
          <p>Soft cotton, oversized fit, perfect for everyday wear.</p>
          <span class="price">฿500</span>
          <a href="index.php?add_to_cart=black-t-shirt" class="btn">Add to Cart</a>
        </div>
      </div>
      <!-- สินค้าอื่นๆ ในทำนองเดียวกัน -->
    </div>
  </section>

  <!-- ส่วน footer เหมือนเดิม -->

</body>
</html>