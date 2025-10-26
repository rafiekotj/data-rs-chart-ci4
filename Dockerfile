# Base image
FROM php:8.2-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install intl mysqli pdo pdo_mysql pgsql pdo_pgsql \
    && docker-php-ext-enable intl pgsql pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Working directory
WORKDIR /var/www/html

# Copy composer files
COPY composer.json composer.lock ./

# Copy composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies (dengan log detail & pengecekan vendor/framework)
RUN composer install --no-dev --optimize-autoloader --no-interaction --verbose \
    && ls -lah vendor \
    && ls -lah vendor/codeigniter4/framework || true

# Copy the rest of the app
COPY . .

# Ensure writable exists
RUN mkdir -p writable/cache writable/logs writable/session \
    && chmod -R 775 writable \
    && chown -R www-data:www-data writable

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

# Start Apache
CMD ["apache2-foreground"]