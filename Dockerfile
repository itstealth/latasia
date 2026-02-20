# -----------------------------
# Stage 1 — Build frontend (Vite)
# -----------------------------
    FROM node:20 AS frontend

    WORKDIR /app
    
    COPY package*.json ./
    RUN npm install
    
    COPY . .
    RUN npm run build
    
    
    # -----------------------------
    # Stage 2 — Laravel + Apache
    # -----------------------------
    FROM php:8.2-apache
    
    # Install system dependencies
    RUN apt-get update && apt-get install -y \
        libzip-dev zip unzip git curl \
        libpng-dev libjpeg-dev libfreetype6-dev \
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install pdo_mysql zip gd
    
    # Install Composer
    COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
    
    # Enable Apache rewrite
    RUN a2enmod rewrite
    
    WORKDIR /var/www/html
    
    # Copy Laravel project
    COPY . .
    
    # Copy built Vite assets
    COPY --from=frontend /app/public/build public/build
    
    # Install PHP dependencies
    RUN composer install --no-dev --optimize-autoloader
    
    # Set permissions
    RUN chown -R www-data:www-data /var/www/html
    
    # Point Apache to public directory
    RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
    
    EXPOSE 80