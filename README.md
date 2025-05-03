<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Peminjaman Ruangan (Room Booking System)

A web-based room booking system built with Laravel that allows users to book rooms and manage room reservations.

## Features

- User authentication and authorization
- Room booking management
- Admin approval system
- Room availability calendar
- Room search and filtering
- Email notifications
- Room capacity and facilities management

## Prerequisites

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & NPM
- Git

## Installation Guide

1. Clone the repository
```bash
git clone https://github.com/yourusername/peminjaman-ruangan.git
cd peminjaman-ruangan
```

2. Install PHP dependencies
```bash
composer install
```

3. Install NPM packages
```bash
npm install
```

4. Create and setup .env file
```bash
cp .env.example .env
php artisan key:generate
```

5. Configure database in .env file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=peminjaman_ruangan
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Run database migrations and seeders
```bash
php artisan migrate --seed
```

7. Build assets
```bash
npm run dev
```

8. Start the local development server
```bash
php artisan serve
```

9. Visit http://localhost:8000 in your browser

## Default Users

After running seeders, you can login with these default accounts:

Admin:
- Email: admin@example.com
- Password: password

Regular User:
- Email: user@example.com
- Password: password

## Directory Structure

Important directories and files in this project:

- `app/Http/Controllers` - Contains all controllers
- `app/Models` - Contains all Eloquent models
- `app/Livewire` - Contains Livewire components
- `database/migrations` - Contains database migrations
- `database/seeders` - Contains database seeders
- `resources/views` - Contains all blade views
- `routes/web.php` - Contains all web routes

## Features Details

### Room Booking Process
1. User logs in to the system
2. Browses available rooms
3. Selects date and time
4. Submits booking request
5. Admin approves/rejects the booking
6. User receives notification

### Admin Features
- Manage rooms (add, edit, delete)
- Approve/reject booking requests
- View booking calendar
- Manage users

### User Features
- View available rooms
- Make booking requests
- View booking status
- View booking history

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
