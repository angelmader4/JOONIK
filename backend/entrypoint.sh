#!/bin/bash

echo "Esperando a la base de datos..."

while ! nc -z database 3306; do
  echo "Base de datos no disponible, intentando nuevamente..."
  sleep 2
done

echo "Base de datos lista. Ejecutando migraciones..."


# Migrar y sembrar la base de datos
php artisan migrate --force
php artisan db:seed --force
php artisan serve --host=0.0.0.0 --port=9000

# Iniciar PHP-FPM
exec php-fpm
