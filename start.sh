#!/usr/bin/env bash

# Laravel prep
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# Start services
php-fpm &
nginx -g 'daemon off;'