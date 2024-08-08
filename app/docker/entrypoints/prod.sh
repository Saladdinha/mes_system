#!/bin/bash
if [ ! -f "vendor/autoload.php" ]; then
composer install --no-progress --no-interaction
fi
if [ ! -f ".env" ]; then
    echo 'missing .env file'
    cp .env.example .env
fi

php artisan migrate
npm run build
php-fpm -D
nginx -g "daemon off;"