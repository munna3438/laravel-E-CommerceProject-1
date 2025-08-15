🚀 How to Run This Laravel Project
Prerequisites

PHP >= 8.1

Composer

MySQL / MariaDB

Node.js & NPM (for frontend assets, if applicable)

Installation Steps

Clone the Repository

git clone https://github.com/your-username/your-laravel-project.git
cd your-laravel-project


Install PHP Dependencies

composer install


Install Node Dependencies (if using Laravel Mix or Vite)

npm install
npm run dev


Create Environment File

cp .env.example .env


Update the .env file with your database and other configuration settings.

Generate Application Key

php artisan key:generate


Run Migrations & Seed Data

php artisan migrate --seed


Start Development Server

php artisan serve



🔑 Admin Dashboard Login

Email: admin@munna.com
Password: 12345600
