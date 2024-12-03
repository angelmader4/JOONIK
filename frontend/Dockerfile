# Usar una imagen base oficial de Node.js
FROM node:18-alpine

# Crear y movernos al directorio de la aplicación
WORKDIR /app

# Copiar los archivos del proyecto
COPY package*.json ./
COPY . .

# Instalar dependencias y construir la aplicación
RUN npm install && npm run build

# Exponer el puerto y ejecutar el servidor
EXPOSE 3000
CMD ["npm", "start"]
