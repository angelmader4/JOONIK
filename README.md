# JOONIK
JOONIK - Full Stack Project
Requisitos previos
Antes de comenzar, asegúrate de tener instalado en tu máquina:

Docker y Docker Compose
Node.js (si deseas ejecutar el frontend sin Docker)
Composer (si deseas ejecutar el backend sin Docker)
Pasos de instalación
1. Clonar el repositorio
Clona este repositorio en tu máquina local:

bash
Copiar código
git clone https://github.com/angelmader4/JOONIK.git
cd JOONIK
2. Configurar el entorno con Docker
Este proyecto incluye un archivo docker-compose.yml que configura automáticamente los servicios de backend, frontend y base de datos.

Ejecutar con Docker
Construye y ejecuta los contenedores:
bash
Copiar código
docker-compose up --build
Accede a los servicios:
Frontend React: http://localhost:3000
Backend Laravel: http://localhost:9000
Variables de entorno
Asegúrate de configurar las siguientes variables en el archivo .env del backend (Laravel). Puedes copiar el archivo de ejemplo:

bash
Copiar código
cp backend/.env.example backend/.env
Edita el archivo .env con los siguientes valores:

env
Copiar código
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
3. Backend (Laravel)
Si prefieres ejecutar el backend sin Docker:

Accede al directorio del backend:
bash
Copiar código
cd backend
Instala las dependencias con Composer:
bash
Copiar código
composer install
Genera la clave de aplicación:
bash
Copiar código
php artisan key:generate
Migra la base de datos:
bash
Copiar código
php artisan migrate
Inicia el servidor:
bash
Copiar código
php artisan serve
El backend estará disponible en http://localhost:8000.

4. Frontend (React)
Si prefieres ejecutar el frontend sin Docker:

Accede al directorio del frontend:
bash
Copiar código
cd frontend
Instala las dependencias con npm:
bash
Copiar código
npm install
Inicia el servidor de desarrollo:
bash
Copiar código
npm start
El frontend estará disponible en http://localhost:3000.

5. Pruebas
Backend (Laravel)
Ejecuta las pruebas de Laravel con el siguiente comando:

bash
Copiar código
php artisan test
Frontend (React)
Ejecuta las pruebas del frontend con Jest:

bash
Copiar código
npm test
Estructura del proyecto
plaintext
Copiar código
JOONIK/
├── backend/                # Código del backend (Laravel)
├── frontend/               # Código del frontend (React)
├── docker-compose.yml      # Configuración de Docker Compose
└── README.md               # Instrucciones del proyecto
Contribución
Si deseas contribuir, crea un fork del repositorio y realiza un pull request con tus cambios.

Licencia
Este proyecto está bajo la Licencia MIT. Consulta el archivo LICENSE para más información.