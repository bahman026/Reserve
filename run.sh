#!/bin/bash
#This bash is not for production environment

composer install
npm i
npm run build

php artisan key:generate

php artisan migrate --seed
chmod -R +x /var/www/html/storage/app

php-fpm -F
