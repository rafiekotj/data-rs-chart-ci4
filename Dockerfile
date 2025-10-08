# Gunakan image PHP resmi dengan Apache
FROM php:8.2-apache

# Install ekstensi yang dibutuhkan oleh CI4 + PostgreSQL
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    zip \
    unzip \
    && docker-php-ext-install intl mysqli pdo pdo_mysql pgsql pdo_pgsql \
    && docker-php-ext-enable intl pgsql pdo_pgsql

RUN apt-get install -y ca-certificates && update-ca-certificates

# Salin semua file ke dalam container
COPY . /var/www/html

# Copy .env agar CodeIgniter bisa membaca konfigurasi environment
COPY .env /var/www/html/.env

# Set working directory
WORKDIR /var/www/html

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Jalankan composer install
RUN composer install --no-interaction --no-progress --prefer-dist

# Atur permission untuk folder writable
RUN chmod -R 777 writable

# Aktifkan mod_rewrite Apache (agar route CI4 berfungsi)
RUN a2enmod rewrite

# Konfigurasi Apache DocumentRoot ke public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update konfigurasi Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Expose port 80
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]