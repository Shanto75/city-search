<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## install Steps

- Clone the project
- Go to the folder application using cd command on your cmd or terminal
    Run composer install on your cmd or terminal

- Copy .env.example file to .env on the root folder. You can type copy .env.-   example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu

- Open your .env file and change the database name (DB_DATABASE) to whatever    you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

- Run php artisan key:generate
- Run php artisan migrate
- Run php artisan serve
- Go to link localhost:8000 OR 127.0.0.1:8000
