FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
        git \
        wget \
        unzip \
        libaio1 \
        libpq-dev \
        libssh-dev \
        libonig-dev \
    && docker-php-ext-install \
        pcntl \
        mbstring

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN usermod -u 1000 www-data
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /var/www