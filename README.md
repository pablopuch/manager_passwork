<p align="center"><a href="#" target="_blank"><img src="catches\logo.png" width="400" alt="Password Logo"></a></p>

# PassWord

It is a project that allows you to have your passwords saved and organised in a very simple way. This project is a first version (1.0)

## Installation process

Clone the repository

    git clone https://github.com/pablopuch/manager_passwork.git

Install all the dependencies using composer

    composer install

Install all the dependencies using composer

    npm install

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


## Screenshots

<img src="catches\home.png" width="400" alt="password">
<img src="catches\Screenshot_1.png" width="400" alt="password">
<img src="catches\Screenshot_2.png" width="400" alt="password">
<img src="catches\Screenshot_3.png" width="400" alt="password">
<img src="catches\Screenshot_4.png" width="400" alt="password">
<img src="catches\Screenshot_5.png" width="400" alt="password">



## Resources

Laravel Bootstrap - https://www.youtube.com/watch?v=9DU7WLZeam8&t=7587s

Laravel bootstrap UI - https://www.youtube.com/watch?v=9DU7WLZeam8&t=6865s

DOMPDF Wrapper for Laravel - https://www.youtube.com/watch?v=n04ic-ALRvw&t=345s 

Laravel Socialite - https://www.youtube.com/watch?v=C98LvIbPSf0







