<p align="center">
    <img src="/public/img/LogoUte.png" alt="UTE Booking Logo" width="200">
</p>

<h1 align="center">Website Đăng Ký Phòng Học</h1>

<p align="center">
    Hệ thống hỗ trợ giảng viên đăng ký phòng học, hội trường phục vụ giảng dạy và tổ chức sự kiện.
</p>

---

## 📌 Giới thiệu

Website được phát triển bởi sinh viên Trường Đại học Sư phạm Kỹ thuật TP.HCM (HCMUTE).

Hệ thống cho phép:
- Giảng viên đăng ký phòng học theo ngày và ca học
- Quản lý phòng, tòa nhà, cơ sở
- Admin duyệt / từ chối yêu cầu đặt phòng
- Theo dõi lịch sử đặt phòng

---

## 👨‍💻 Developers

- Trần Quang Đức  
- Ngô Trường Thành  

---

## ⚙️ Yêu cầu hệ thống

Để chạy project, bạn cần cài:

- PHP >= **8.1**
- Composer
- MySQL / MariaDB
- Node.js (nếu cần)
- XAMPP / Laragon (khuyến khích)

---

## 📥 Cách tải và chạy project

### 🔹 Bước 1: Clone project

git clone https://github.com/tranquangduc47vn/qldatphong.git
cd <repo>
### 🔹 Bước 2: Cài thư viện
composer install
### 🔹 Bước 4: Cấu hình Database
--Mở file .env chỉnh--
DB_DATABASE=ten_database
DB_USERNAME=root
DB_PASSWORD=matkhau
### Bước 5: Generate key
php artisan key:generate
### Bước 6: Import database
-Mở phpMyAdmin
-Tạo database mới trung tên với tên tạo ở file .env
### Bước 7: Mở terminal 
chạy lệnh
php artisan migrate
### Bước 8: chạy project
http://127.0.0.1:8000

### Tài khoản admin mẫu
 admin@gmail.com    12345678
