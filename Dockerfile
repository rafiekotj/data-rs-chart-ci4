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

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Copy composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies (AFTER copying project)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Make sure writable folder exists (important!)
RUN mkdir -p writable

# Set correct permissions
RUN chown -R www-data:www-data writable && chmod -R 775 writable

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Set ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]