#!/bin/bash
php-fpm8.1 -D        # Start PHP-FPM in daemon mode
nginx -g 'daemon off;'  # Start NGINX in foreground for container
