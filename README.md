<p align="center"><img src="/public/img/LogoUte.png" alt="PolyBooking Logo"></p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Website Đăng Ký Phòng học

<p>
    Website PolyBooing was developed by students from FPT Polytechnic College. The website is developed to allow lecturers to book hall and classrooms for events or other learning activities. 
</p>

## Developers

- Trần Quang Đức 
- Ngô Trường Thành

## Download

On `Github`: <a href="https://github.com/Tam0721/nhom1_bookht_xth">Here</a>

```
git clone https://github.com/Tam0721/nhom1_bookht_xth.git
```

Or on `Google Drive`: <a href="https://drive.google.com/drive/folders/1fhHQgWxMTcj1j2mQehBiYoXzC4EybZBQ?usp=sharing" target="_blank">Here</a>

<a href="https://drive.google.com/drive/folders/1fhHQgWxMTcj1j2mQehBiYoXzC4EybZBQ?usp=sharing" target="_blank">
    <img src="/public/img/google_drive.png">
</a>

## Setting

- Extract source

<img src="/public/img/extract.png">

- Create new folder in `xampp\htdocs` and move source to the folder was just created

<img src="/public/img/move_source.png">

## Open the window `Command Line` in the folder was just created

- Remove bootstrap files `events`, `views`, `cache`, `route`, `config`, `compiled` to optimize the website

```
php artisan optimize:clear
```

- Create new key

```
php artisan key:generate
```

## Access phpmyadmin in `Xampp Control Panel`

1. Create new database

<img src="/public/img/create_database.png">

2. `Import` database

<img src="/public/img/import_database.png">

## Connect to database

Update information in file `.env` to connect to database

<img src="/public/img/connect.png">

## Run website
- Open `Command Line`

```
npm run dev
```

<img src="/public/img/run1.png">

- Open other `Command Line`

```
php artisan serve
```

<img src="/public/img/run2.png">

## Login to administration page

Access:

```
127.0.0.1:8000/login
```

- Email: <b>admin@fe.edu.vn</b>

- Password: <b>12345678</b>
