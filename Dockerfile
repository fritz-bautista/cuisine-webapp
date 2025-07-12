FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    nginx supervisor git curl zip unzip libpq-dev libzip-dev libpng-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy source code
COPY . .

# Copy config files
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./docker/supervisord.conf /etc/supervisord.conf

# Set permissions (adjust as needed)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Laravel app build
RUN composer install --no-interaction --prefer-dist --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

EXPOSE 80

# Start Supervisor to launch both services
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
