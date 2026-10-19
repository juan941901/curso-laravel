#!/bin/bash
set -e

# Crear .env a partir de .env.example si no existe
if [ ! -f .env ]; then
    echo "--> Archivo .env no encontrado. Creando desde .env.example..."
    cp .env.example .env
fi

# Instalar dependencias de PHP si la carpeta vendor no existe
if [ ! -d vendor ]; then
    echo "--> Carpeta vendor no encontrada. Ejecutando composer install..."
    composer install --no-interaction
fi

# Generar APP_KEY si aún no está asignada en el .env
if ! grep -q "^APP_KEY=base64:" .env; then
    echo "--> Generando APP_KEY de Laravel..."
    php artisan key:generate
fi

# Instalar dependencias de Node si falta node_modules
if [ ! -d node_modules ]; then
    echo "--> Carpeta node_modules no encontrada. Ejecutando npm install..."
    npm install
fi

# Ejecutar el CMD original (composer run dev)
exec "$@"