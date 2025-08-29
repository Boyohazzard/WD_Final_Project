<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Project Setup (Laravel + Vite)
This guide explains how to set up and run the project locally.
Every team member must follow these steps after cloning or pulling the repository.

1. Prerequisites

Make sure you have the following installed:

PHP 8.2+ (XAMPP recommended on Windows)

Composer

Node.js 18+ and npm

⚠️ On Windows PowerShell you may need:
Set-ExecutionPolicy -Scope Process Bypass

2. First-time Setup (per machine)

Clone the project

git clone https://github.com/Boyohazzard/WD_Final_Project.git
cd WD_Final_Project


Install PHP dependencies

composer install


Install frontend dependencies

npm install


Environment file

cp .env.example .env
php artisan key:generate


Edit .env and configure:

DB_DATABASE=laravel

DB_USERNAME=root

DB_PASSWORD= (or your MySQL password)

Adjust DB_PORT=3306 if you changed MySQL port.

Database

Create the database in phpMyAdmin or MySQL CLI:

CREATE DATABASE laravel;


Run migrations:

php artisan migrate


(Optional) Seed demo data:

php artisan db:seed

1. Running the Project (every time you develop)

Open two terminals:

Terminal A – Laravel server

php artisan serve


Runs on: http://127.0.0.1:8000

Terminal B – Vite (frontend build)

npm run dev

4. After Pulling New Code (git pull)

Run the following to ensure dependencies & database are updated:

composer install
npm install
php artisan migrate
npm run dev

5. Common Issues

Vite manifest not found

Run:

npm install
npm run dev
php artisan view:clear
php artisan cache:clear


MySQL won’t start in XAMPP

Check if port 3306 is in use:

netstat -ano | findstr :3306


If corrupted, restore from xampp/mysql/backup/.

Reset migrations

php artisan migrate:fresh --seed

6. Notes for Team Members

Backend developers: Run migrations frequently, write seeders for test data.

Frontend developers: Always run npm run dev to see latest changes.

Everyone: Do not commit public/build/* or .env to Git (already ignored).