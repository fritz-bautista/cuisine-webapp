# === Stage 1: Backend (Composer) ===
FROM composer:latest AS build-backend

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader

# === Stage 2: Frontend (Vite Build) ===
FROM node:18 AS build-frontend

WORKDIR /app
COPY . .

RUN npm install
RUN npm run build     # creates /public/build + manifest.json

# === Stage 3: Runtime (Nginx + PHP-FPM) ===
FROM richarvey/nginx-php-fpm:3.1.6

# Copy Laravel app
COPY --from=build-backend /app /var/www/html

# Copy compiled frontend assets
COPY --from=build-frontend /app/public /var/www/html/public

# Override default Nginx config (must match port + TCP)
COPY ./docker/nginx/nginx.conf /etc/nginx/sites-available/default

# Set environment for Laravel + container behavior
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

# Ensure required Laravel folders are writable
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Optional: Pre-cache Laravel config/routes for faster boot
RUN php /var/www/html/artisan config:cache && \
    php /var/www/html/artisan route:cache

# Expose Render’s expected port
EXPOSE 10000