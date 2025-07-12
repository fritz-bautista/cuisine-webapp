FROM php:8.2-fpm

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    libpq-dev zip unzip git curl libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy full Laravel app (including artisan!)
COPY . .

# Fix permissions before running Composer
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# ✅ Composer install AFTER full app (artisan now exists)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# ✅ Optional: Set permission again if needed
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
