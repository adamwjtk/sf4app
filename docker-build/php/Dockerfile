FROM php:7.4-fpm

RUN apt-get update && apt-get install -y libpq-dev libcurl4 libcurl4-openssl-dev libxml2-dev git-all postgresql-contrib \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install -j$(nproc) pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer