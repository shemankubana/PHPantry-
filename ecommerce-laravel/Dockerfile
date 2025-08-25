# Start with a base PHP image with Apache
FROM php:8.2-apache

# Install system dependencies needed for Laravel, including libfreetype6-dev
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PDO_PGSQL extension for PostgreSQL
RUN docker-php-ext-install pdo_pgsql

# Install GD extension for image processing (common for Laravel apps)
# This will allow Laravel to use image manipulation libraries if you add them later.
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd # <--- Corrected: hyphen instead of underscore

# Install other PHP extensions if needed (e.g., zip, bcmath, exif)
RUN docker-php-ext-install zip bcmath exif opcache

# Set Apache document root to Laravel's public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy your Laravel application code into the container
WORKDIR /var/www/html
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set appropriate permissions for Laravel's storage and bootstrap/cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 (default for Apache)
EXPOSE 80

# The default command for php:8.2-apache image starts Apache
CMD ["apache2-foreground"]
