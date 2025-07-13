#!/bin/sh

# Replace ${PORT} in Nginx config with actual value from env
envsubst '$PORT' < /etc/nginx/conf.d/default.conf > /etc/nginx/conf.d/default.conf.new
mv /etc/nginx/conf.d/default.conf.new /etc/nginx/conf.d/default.conf

# Start PHP-FPM and Nginx
/usr/sbin/php-fpm &
nginx -g 'daemon off;'
