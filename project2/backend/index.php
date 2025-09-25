<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: frontend/login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome - BEYONCE Shop</title>
</head>
<body>
  <h1>Welcome <?php echo htmlspecialchars($_SESSION['fullname']); ?>!</h1>
  <p>Your email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
  <a href="../backend/logout.php">Logout</a>
</body>
</html>
