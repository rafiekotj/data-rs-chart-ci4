# Gunakan image PHP resmi dengan ekstensi yang dibutuhkan
FROM php:8.2-apache

# Aktifkan mod_rewrite agar CI4 bisa pakai routing
RUN a2enmod rewrite

# Install dependencies dasar
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Set working directory di dalam container
WORKDIR /var/www/html

# Copy semua file project ke dalam container
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Jalankan composer install
RUN composer install --no-interaction --no-progress --prefer-dist

# Atur permission untuk writable folder CI4
RUN chmod -R 777 writable

# Konfigurasi Apache agar index.php diakses dari public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Expose port
EXPOSE 8080

# Jalankan Apache di port 8080 (Render pakai $PORT)
CMD ["apache2-foreground"]
