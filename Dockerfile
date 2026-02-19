FROM php:8.2-apache

# 1. Install System Dependencies (Zip, Git, Images)
RUN apt-get update && apt-get install -y     libzip-dev     zip     unzip     git     curl     libpng-dev     libjpeg-dev     libfreetype6-dev     && docker-php-ext-configure gd --with-freetype --with-jpeg     && docker-php-ext-install pdo_mysql zip gd

# 2. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Enable Apache Rewrite for Laravel
RUN a2enmod rewrite

# 4. Point Apache to 'public' folder
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
