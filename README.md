<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Role Permission System

A Laravel-based role and permission management system that allows for fine-grained access control.

## Prerequisites

- PHP >= 8.0
- Composer
- MySQL

## Installation

Follow these steps to get the project up and running on your local machine:

1. Clone the repository
git clone https://github.com/YOUR-USERNAME/laravel-role-permission.git
cd laravel-role-permission

2. Install PHP dependencies
composer install

3. Environment Setup
cp .env.example .env

4. Configure your .env file

Update the following variables in your .env file:

- DB_DATABASE=your_database_name
- DB_USERNAME=your_database_username
- DB_PASSWORD=your_database_password

5. Generate application key 
php artisan key:generate

6. set SESSION_DRIVER=file (For local development) & FILESYSTEM_DISK=public (accessible via public/storage) in .env to maintain the 

7. Run database migrations and seeders
php artisan migrate
php artisan db:seed

8. Start the development server
php artisan serve

Your application should now be running at http://localhost:8000  otherwise you can directly trigger localhost/laravel-role-permissions in browser

## Check that storage and bootstrap/cache directories are writable
chmod -R 775 storage bootstrap/cache otherwise give all read & write then, chmod -R 777 storage bootstrap/cache

## I dont push .env & vendor folder in my github repo because of large storage, so please be confirm so that i will send you vendor & .env (if you dont copied) after your installation.
