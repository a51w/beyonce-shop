-- สร้างฐานข้อมูล (ถ้ายังไม่มี)
CREATE DATABASE IF NOT EXISTS user_db;

-- ใช้ฐานข้อมูลที่สร้าง
USE user_db;

-- สร้างตาราง users (ถ้ายังไม่มี)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) UNIQUE NOT NULL,
  fullname VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  phone VARCHAR(20),        -- เพิ่มเบอร์โทร
  address TEXT              -- เพิ่มที่อยู่
);

-- สร้างตาราง addresses (ผูกกับ username)
CREATE TABLE IF NOT EXISTS addresses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  address TEXT NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (username) REFERENCES users(username)
);

-- สร้างตาราง orders (ประวัติการสั่งซื้อ)
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  details TEXT,
  FOREIGN KEY (username) REFERENCES users(username)
);

-- สร้างตาราง products
CREATE TABLE IF NOT EXISTS products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  stock INT NOT NULL
);

-- สร้างตาราง sales_data
CREATE TABLE IF NOT EXISTS sales_data (
  id INT AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(255) NOT NULL,
  sales DECIMAL(10, 2) NOT NULL
);

-- เพิ่มข้อมูลตัวอย่างในตาราง sales_data
INSERT INTO sales_data (category, sales) VALUES
('Clothing', 50000),
('Accessories', 30000),
('Shoes', 20000),
('Bags', 15000);

-- สร้างตาราง monthly_sales
CREATE TABLE IF NOT EXISTS monthly_sales (
  id INT AUTO_INCREMENT PRIMARY KEY,
  month VARCHAR(50) NOT NULL,
  sales DECIMAL(10, 2) NOT NULL
);

-- เพิ่มข้อมูลตัวอย่างในตาราง monthly_sales
INSERT INTO monthly_sales (month, sales) VALUES
('January', 12000),
('February', 15000),
('March', 10000),
('April', 20000),
('May', 25000),
('June', 30000);