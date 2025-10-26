# Base image
FROM php:8.2-apache

# Install system dependencies + PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    zip unzip git \
    build-essential \
    pkg-config \
    zlib1g-dev \
    libonig-dev \
 && docker-php-ext-configure zip \
 && docker-php-ext-install intl pdo pdo_mysql mbstring zip \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache Rewrite
RUN a2enmod rewrite

# Copy Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Make sure writable folder exists
RUN mkdir -p writable/cache writable/logs writable/session

# Set permissions writable
RUN chown -R www-data:www-data writable \
 && chmod -R 775 writable

# Set Apache DocumentRoot to public/
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
 && sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2-foreground"]
