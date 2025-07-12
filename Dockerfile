# === Stage 1: Composer dependencies ===
FROM composer:latest AS build-backend

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# === Stage 2: Node build for Vite ===
FROM node:18 AS build-frontend

WORKDIR /app
COPY . .

RUN npm install
RUN npm run build     # generates /public/build with manifest.json

# === Stage 3: Final image with Nginx + PHP-FPM ===
FROM richarvey/nginx-php-fpm:3.1.6

# Copy Laravel app from backend stage
COPY --from=build-backend /app /var/www/html

# Copy Vite-built assets into public/
COPY --from=build-frontend /app/public /var/www/html/public

# Nginx & Laravel env settings
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

# Nginx config override (optional)
COPY ./docker/nginx/nginx.conf /etc/nginx/sites-available/default

EXPOSE 80
