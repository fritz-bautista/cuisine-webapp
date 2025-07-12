#!/bin/sh

set -e

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

php-fpm &

nginx -g "daemon off;"
