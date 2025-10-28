# Base image
FROM php:8.2-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd intl mysqli pdo pdo_mysql pgsql pdo_pgsql zip \
    && docker-php-ext-enable gd intl pgsql pdo_pgsql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Working directory
WORKDIR /var/www/html

# Copy composer files
COPY composer.json composer.lock ./

# Copy composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Copy project files
COPY . .

# Copy environment configuration file
COPY .env /var/www/html/.env

# Set correct permissions
RUN chmod -R 775 writable && chown -R www-data:www-data writable

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Set ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose HTTP port
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]