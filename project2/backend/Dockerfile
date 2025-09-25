# ใช้ image PHP/Apache
FROM php:7.4-apache

# ติดตั้งคำสั่งที่จำเป็น
RUN docker-php-ext-install mysqli pdo pdo_mysql

# คัดลอกไฟล์ทั้งหมดจาก backend ไปที่ /var/www/html
COPY . /var/www/html/

# เปิดพอร์ต 80
EXPOSE 80
