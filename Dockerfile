# Base Image
FROM php:8.2-apache

# Install system dependencies + PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    zip unzip git \
 && docker-php-ext-install intl pdo pdo_mysql mbstring zip \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache Rewrite
RUN a2enmod rewrite

# Copy Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project into container
COPY . .

# Install dependencies (without dev)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Make sure writable exists (Render sometimes skips it if .gitignore removes it)
RUN mkdir -p writable && mkdir -p writable/cache && mkdir -p writable/logs

# Set writable permissions
RUN chown -R www-data:www-data writable \
 && chmod -R 775 writable

# Change Apache DocumentRoot → public/
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
 && sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2-foreground"]
