#!/bin/sh
set -e

# Run Laravel migrations
php /var/www/html/artisan migrate --force

# Start Apache in foreground
exec apache2-foreground
