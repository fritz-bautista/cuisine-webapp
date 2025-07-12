# === Stage 1: Composer dependencies ===
FROM composer:2.7 as build-backend

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader

# === Stage 2: Node build for Vite ===
FROM node:18 as build-frontend

WORKDIR /app
COPY . .

RUN npm install && npm run build

# === Stage 3: Final container ===
FROM richarvey/nginx-php-fpm:php8.1

ENV SKIP_COMPOSER=true
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1

COPY --from=build-backend /app /var/www/html
COPY --from=build-frontend /app/public /var/www/html/public

# Replace Nginx config
COPY ./docker/nginx/nginx.conf /etc/nginx/sites-enabled/default.conf

EXPOSE 80
