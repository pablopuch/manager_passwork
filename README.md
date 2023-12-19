<p align="center"><a href="#" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Installation process

Clone the repository

    git clone https://github.com/pablopuch/manager_passwork.git


Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a random key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run seed your database

    php artisan db:seed

Generate a key for JWT

    php artisan jwt:secret

Symbolic link in your application's

    php artisan storage:link

Start the local development server

    php artisan serve


## Resources

Laravel Bootstrap - https://www.youtube.com/watch?v=9DU7WLZeam8&t=7587s

Laravel bootstrap UI - https://www.youtube.com/watch?v=9DU7WLZeam8&t=6865s

DOMPDF Wrapper for Laravel - https://www.youtube.com/watch?v=n04ic-ALRvw&t=345s 

Laravel Socialite - https://www.youtube.com/watch?v=C98LvIbPSf0







