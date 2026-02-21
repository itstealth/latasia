FROM php:8.2-apache

# 1. Install System Dependencies (Added libicu-dev for intl)
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libpng-dev libjpeg-dev libfreetype6-dev libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo_mysql zip gd intl

# 2. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Enable Apache Rewrite for Laravel
RUN a2enmod rewrite

# 4. Point Apache to 'public' folder
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 5. Set working directory
WORKDIR /var/www/html

# 6. CI/CD Permanent Fix: Create required Laravel folders so 'optimize' never fails
RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache