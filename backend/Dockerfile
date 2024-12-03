# Usar una imagen base oficial de PHP con soporte para Composer
FROM php:8.1-fpm

# Establecer permisos y limpiar caché
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar extensiones necesarias para Laravel y netcat
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    netcat-openbsd \
    nginx \
    zip && \
    docker-php-ext-install pdo pdo_mysql zip && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Configurar PHP-FPM para escuchar en todas las interfaces
RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

# Copiar los archivos del proyecto
WORKDIR /var/www/html
COPY . .

# Establecer permisos para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Copiar el script de inicialización
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh && chmod +x /usr/local/bin/entrypoint.sh

CMD ["php", "-S", "0.0.0.0:9000", "-t", "/var/www/html"]

# Configurar el entrypoint
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]



# Exponer el puerto de PHP-FPM
EXPOSE 9000