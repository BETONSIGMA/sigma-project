FROM php:8.4-fpm
RUN apt-get update && apt-get install -y \
    zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    libpq-dev postgresql-client postgresql-contrib \
    && docker-php-ext-install intl opcache pdo pdo_pgsql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip
WORKDIR /var/www
COPY . .
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
