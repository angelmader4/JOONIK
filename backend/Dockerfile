# Usar una imagen base oficial de PHP con soporte para Composer
FROM php:8.1-fpm

# Establecer permisos y limpiar caché
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip && \
    docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Copiar los archivos del proyecto
WORKDIR /var/www/html
COPY . .

# Establecer permisos y limpiar caché
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Configurar el comando de inicio
CMD ["php-fpm"]

EXPOSE 9000
