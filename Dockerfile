# === Stage 1: Composer dependencies ===
FROM composer:latest AS build-backend

WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader

# === Stage 2: Node build for Vite ===
FROM node:18 AS build-frontend

WORKDIR /app
COPY . .
RUN npm install
RUN npm run build

# === Stage 3: Final image with Nginx + PHP-FPM ===
FROM richarvey/nginx-php-fpm:3.1.6

COPY --from=build-backend /app /var/www/html
COPY --from=build-frontend /app/public /var/www/html/public
COPY ./docker/nginx/nginx.conf /etc/nginx/sites-available/default

RUN composer install --no-dev --optimize-autoloader --working-dir=/var/www/html
RUN php /var/www/html/artisan config:cache
RUN php /var/www/html/artisan route:cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

EXPOSE 80
