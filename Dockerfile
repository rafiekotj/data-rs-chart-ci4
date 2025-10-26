# Stage 1: Build dependencies
FROM php:8.2-cli AS build

RUN apt-get update && apt-get install -y \
    libicu-dev libzip-dev libonig-dev zlib1g-dev zip unzip git curl \
    build-essential pkg-config \
 && docker-php-ext-configure zip \
 && docker-php-ext-install intl pdo pdo_mysql mbstring zip \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /app

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

COPY . .

# Stage 2: Runtime
FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libicu-dev libzip-dev libonig-dev zlib1g-dev zip unzip git \
 && docker-php-ext-configure zip \
 && docker-php-ext-install intl pdo pdo_mysql mbstring zip \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy dari build stage
COPY --from=build /app /var/www/html

# Writable folder
RUN mkdir -p writable/cache writable/logs writable/session \
 && chown -R www-data:www-data writable \
 && chmod -R 775 writable

# DocumentRoot ke public
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
 && sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2-foreground"]