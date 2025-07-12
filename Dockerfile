# ✨ Stage 1: Build Laravel App with Composer
FROM composer:latest AS build

WORKDIR /app

COPY . .
RUN composer install --no-dev --optimize-autoloader

# 📦 Stage 2: PHP + NGINX
FROM richarvey/nginx-php-fpm:3.1.6

COPY --from=build /app /var/www/html

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Copy your custom nginx config
COPY ./docker/nginx/nginx.conf /etc/nginx/sites-available/default

EXPOSE 80