FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install PostgreSQL PDO driver
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    zip \
    git \
    && docker-php-ext-install pdo_pgsql pgsql

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install PHP dependencies with Composer
RUN composer install

# Fix permissions (optional)
RUN chown -R www-data:www-data /var/www/html

# Expose Apache port
EXPOSE 80
