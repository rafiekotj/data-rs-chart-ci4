# Stage 1: Build Composer dependencies
FROM php:8.2-cli AS build

# Install PHP extensions & system dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev libpq-dev libzip-dev zip unzip git \
    build-essential pkg-config zlib1g-dev libonig-dev curl \
 && docker-php-ext-configure zip \
 && docker-php-ext-install intl pdo pdo_mysql mbstring zip \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Copy application source
COPY . .

# Stage 2: Runtime PHP + Apache
FROM php:8.2-apache

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev libpq-dev libzip-dev zip unzip git \
    zlib1g-dev libonig-dev \
 && docker-php-ext-configure zip \
 && docker-php-ext-install intl pdo pdo_mysql mbstring zip \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy built application from build stage
COPY --from=build /app /var/www/html

# Make writable directories
RUN mkdir -p writable/cache writable/logs writable/session \
 && chown -R www-data:www-data writable \
 && chmod -R 775 writable

# Set DocumentRoot to public/
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
 && sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2-foreground"]