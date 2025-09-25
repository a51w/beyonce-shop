<?php
$host = 'db';
$db = 'user_db';
$user = 'user';
$pass = '1234';

// ✅ รอให้ MySQL พร้อมก่อน
$max_attempts = 5;
$attempt = 0;
$conn = null;

while ($attempt < $max_attempts) {
    $conn = @new mysqli($host, $user, $pass, $db);
    if (!$conn->connect_error) break;

    $attempt++;
    sleep(2); // รอ 2 วิแล้วลองใหม่
}

if ($conn->connect_error) {
    echo "<script>
        alert('❌ Cannot connect to database.');
        window.location.href = 'register.html';
    </script>";
    exit();
}

// ✅ รับข้อมูลจากฟอร์ม
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// ✅ ตรวจ username ซ้ำ
$check = $conn->prepare("SELECT id FROM users WHERE username = ?");
$check->bind_param("s", $username);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "<script>
        alert('❌ Username already exists. Please choose a different one.');
        window.location.href = 'register.html';
    </script>";
    exit();
}

// ✅ บันทึกข้อมูลผู้ใช้
$stmt = $conn->prepare("INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $fullname, $username, $email, $password);

if ($stmt->execute()) {
    echo "<script>
        alert('✅ Registration successful!');
        window.location.href = 'login.html';
    </script>";
} else {
    echo "<script>
        alert('❌ Registration failed: " . addslashes($stmt->error) . "');
        window.location.href = 'register.html';
    </script>";
}

$stmt->close();
$conn->close();
?>