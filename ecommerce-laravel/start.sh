#!/bin/sh
set -e

echo "Running Laravel migrations..."
php /var/www/html/artisan migrate --force

echo "Starting Apache..."
exec apache2-foreground
