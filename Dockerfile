FROM php:8.2-fpm

# Install required system packages
RUN apt-get update && apt-get install -y \
    nginx zip unzip git curl libpq-dev libzip-dev libpng-dev supervisor \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy app source
COPY . .

# Copy Nginx config and Supervisor config
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY ./docker/supervisord.conf /etc/supervisord.conf

# Laravel build steps
RUN composer install --no-interaction --prefer-dist --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Expose port 80 for Render
EXPOSE 80

CMD ["php-fpm"]
