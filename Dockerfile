FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    nginx zip unzip git curl libpq-dev libzip-dev libpng-dev supervisor \
    && docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./docker/supervisord.conf /etc/supervisord.conf

RUN composer install --no-interaction --prefer-dist --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 80

CMD ["supervisord", "-c", "/etc/supervisord.conf"]