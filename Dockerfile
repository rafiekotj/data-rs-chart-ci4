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
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Copy composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy only composer files first (better caching)
COPY composer.json composer.lock ./

# Install dependencies first (so code changes won't force full rebuild)
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Copy the rest of the project
COPY . .

# Ensure writable exists and assign permissions
RUN mkdir -p writable \
 && chown -R www-data:www-data writable \
 && chmod -R 775 writable

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set DocumentRoot (NEW recommended format)
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Set ServerName
RUN echo "ServerName=localhost" >> /etc/apache2/apache2.conf

# Container port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
