# Base image
FROM php:8.2-apache

# Install system & PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    libonig-dev \
    zip \
    unzip \
    git \
 && docker-php-ext-install intl mysqli pdo pdo_mysql pgsql pdo_pgsql mbstring \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Working directory
WORKDIR /var/www/html

# Copy composer binary from composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy all project files (including system & app folders)
COPY . .

# Install dependencies (AFTER full code is present!)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Set writable permissions
RUN mkdir -p writable \
 && chown -R www-data:www-data writable \
 && chmod -R 775 writable

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set document root (CodeIgniter public/)
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Fix ServerName (correct syntax)
RUN echo "ServerName localhost" >> /etc/apache2/conf-enabled/servername.conf

EXPOSE 80
CMD ["apache2-foreground"]
