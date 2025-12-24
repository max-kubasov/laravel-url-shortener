# ✂️ LinkCut - URL Shortener

A clean and fast URL shortening service built with **Laravel 12** and **Tailwind CSS**.

## ✨ Features
* **Instant Shortening**: Generate a 6-character unique code for any URL.
* **Dark Mode UI**: Sleek and modern interface built with Tailwind CSS.
* **Redirect Logic**: Automatic redirection from short codes to original destinations.
* **SQLite Powered**: Lightweight and portable database.

## 🚀 Tech Stack
* **Backend**: [Laravel 12](https://laravel.com)
* **Frontend**: [Tailwind CSS](https://tailwindcss.com)
* **Database**: SQLite

## 🛠️ Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/max-kubasov/laravel-url-shortener.git](https://github.com/max-kubasov/laravel-url-shortener.git)
   cd laravel-url-shortener


## 🛠️ Installation & Local Setup

1. **Install PHP dependencies:**
```bash
composer install

2. Configure Environment:

**Copy the example environment file:**

```bash
cp .env.example .env

3. **Generate an application key:**

```bash
php artisan key:generate

4. Initialize Database:

**Create the SQLite database and run migrations:**

```bash
touch database/database.sqlite
php artisan migrate
