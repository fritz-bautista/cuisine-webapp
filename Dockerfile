# ----------------------------
# Stage: Laravel PHP-FPM Setup
# ----------------------------
FROM php:8.2-fpm as backend

# Install required system packages including Nginx and PostgreSQL driver
RUN apt-get update && apt-get install -y \
    nginx zip unzip git curl libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer (v2.7)
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel app code
COPY . .

# Install Laravel dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Ensure proper permissions for storage and cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Copy custom Nginx config
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Copy and enable entrypoint script
COPY ./docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expose HTTP port
EXPOSE 80

# Start Laravel + Nginx
CMD ["/entrypoint.sh"]
