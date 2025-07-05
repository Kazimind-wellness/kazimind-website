# Use the official PHP image with Composer and Apache
FROM php:8.2-apache

# Enable mod_rewrite for Laravel and modern PHP apps
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files into the container
COPY . .

# Set correct permissions (optional)
RUN chown -R www-data:www-data /var/www/html

# Expose port (Render listens on 10000 automatically)
EXPOSE 80
