# ใช้ PHP + Apache จาก Docker Hub
FROM php:8.2-apache

# คัดลอกไฟล์ทั้งหมดของโปรเจกต์ไปยังโฟลเดอร์ที่ Apache ใช้งาน
COPY . /var/www/html/

# เปิดพอร์ต 8000 (หรือ 80 ถ้าไม่ได้ตั้งค่า PORT)
EXPOSE 8000

# สั่งให้ Apache ทำงานใน foreground
CMD ["apache2-foreground"]