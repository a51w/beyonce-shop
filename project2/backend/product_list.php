<?php
include 'db.php'; // เชื่อมต่อกับฐานข้อมูล

// ดึงข้อมูลสินค้าจากฐานข้อมูล
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['product_id']; ?></td>
                <td><?php echo $product['product_name']; ?></td>
                <td>฿<?php echo $product['price']; ?></td>
                <td><?php echo $product['stock']; ?></td>
                <td><button class='btn' onclick='deleteProduct(<?php echo $product['id']; ?>)'>Delete</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
