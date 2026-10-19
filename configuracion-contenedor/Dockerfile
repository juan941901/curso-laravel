FROM ubuntu:24.04

ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependencias base y configurar el PPA de PHP 8.5
RUN apt-get update && apt-get install -y --no-install-recommends \
    software-properties-common \
    curl \
    git \
    unzip \
    ca-certificates \
    && LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y \
    && apt-get update \
    && apt-get install -y --no-install-recommends \
        php8.5-cli \
        php8.5-curl \
        php8.5-mbstring \
        php8.5-mysql \
        php8.5-pgsql \
        php8.5-sqlite3 \
        php8.5-soap \
        php8.5-xml \
        php8.5-zip \
        php8.5-intl \
        php8.5-gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer 2.10.3
COPY --from=composer:2.10.3 /usr/bin/composer /usr/bin/composer

# Instalar Node.js v24.21.0 y npm desde la imagen oficial
COPY --from=node:24.21.0 /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node:24.21.0 /usr/local/bin /usr/local/bin

# Copiar el script de entrada y darle permisos de ejecución
COPY ./configuracion-contenedor/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html

EXPOSE 8000 5173

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["composer", "run", "dev"]