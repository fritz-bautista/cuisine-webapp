#!/bin/sh

set -e

# Laravel cache (optional)
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Start PHP-FPM
php-fpm &

# Start Nginx in foreground
nginx -g "daemon off;"
