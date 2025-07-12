FROM php:8.2-fpm as backend

RUN apt-get update && apt-get install -y \
    nginx zip unzip git curl libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# After installing nginx and setting up Laravel
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

CMD ["/entrypoint.sh"]
