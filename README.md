
# **JOONIK - Full Stack Project**

## **Requisitos previos**
Antes de comenzar, asegúrate de tener instalado en tu máquina:

- **Docker** y **Docker Compose**
- **Node.js** (si deseas ejecutar el frontend sin Docker)
- **Composer** (si deseas ejecutar el backend sin Docker)

---

## **Pasos de instalación**

### **1. Clonar el repositorio**
Clona este repositorio en tu máquina local:

```bash
git clone https://github.com/angelmader4/JOONIK.git
cd JOONIK
```

---

### **2. Configurar el entorno con Docker**
Este proyecto incluye un archivo `docker-compose.yml` que configura automáticamente los servicios de backend, frontend y base de datos.

#### **Ejecutar con Docker**
1. Construye y ejecuta los contenedores:
   ```bash
   docker-compose up --build
   ```
2. Accede a los servicios:
   - **Frontend React**: [http://localhost:3000](http://localhost:3000)
   - **Backend Laravel**: [http://localhost:9000](http://localhost:9000)

#### **Variables de entorno**
Asegúrate de configurar las siguientes variables en el archivo `.env` del backend (Laravel). Puedes copiar el archivo de ejemplo:

```bash
cp backend/.env.example backend/.env
```

Edita el archivo `.env` con los siguientes valores:

```env
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```

---

### **3. Backend (Laravel)**
Si prefieres ejecutar el backend sin Docker:

1. Accede al directorio del backend:
   ```bash
   cd backend
   ```
2. Instala las dependencias con Composer:
   ```bash
   composer install
   ```
3. Genera la clave de aplicación:
   ```bash
   php artisan key:generate
   ```
4. Migra la base de datos:
   ```bash
   php artisan migrate
   ```
5. Inicia el servidor:
   ```bash
   php artisan serve
   ```

El backend estará disponible en [http://localhost:8000](http://localhost:8000).

---

### **4. Frontend (React)**
Si prefieres ejecutar el frontend sin Docker:

1. Accede al directorio del frontend:
   ```bash
   cd frontend
   ```
2. Instala las dependencias con npm:
   ```bash
   npm install
   ```
3. Inicia el servidor de desarrollo:
   ```bash
   npm start
   ```

El frontend estará disponible en [http://localhost:3000](http://localhost:3000).

---

### **5. Pruebas**
#### **Backend (Laravel)**
Ejecuta las pruebas de Laravel con el siguiente comando:

```bash
php artisan test
```

#### **Frontend (React)**
Ejecuta las pruebas del frontend con Jest:

```bash
npm test
```

---

## **Estructura del proyecto**
```plaintext
JOONIK/
├── backend/                # Código del backend (Laravel)
├── frontend/               # Código del frontend (React)
├── docker-compose.yml      # Configuración de Docker Compose
└── README.md               # Instrucciones del proyecto
```

---

## **Contribución**
Si deseas contribuir, crea un fork del repositorio y realiza un pull request con tus cambios.

---

## **Licencia**
Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más información.
