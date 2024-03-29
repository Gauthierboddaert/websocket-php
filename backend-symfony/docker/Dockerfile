FROM php:8.2.1-fpm-alpine

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN apk add --no-cache bash

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash
RUN apk add --no-cache symfony-cli
RUN apk add git
RUN apk add screen

RUN set -ex \
    && apk --no-cache add \
    postgresql-dev

RUN set -ex \
    && apk --no-cache add \
    postgresql-dev \
    libpng-dev \
    libzip-dev \
    zip \
    libjpeg-turbo-dev \
    freetype-dev \
    linux-headers \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip
RUN docker-php-ext-install -j$(nproc) intl pdo mysqli pdo_mysql
RUN docker-php-ext-install sysvsem
RUN docker-php-ext-enable pdo_mysql

RUN apk add --no-cache yarn

RUN apk add --no-cache \
        libstdc++ \
        libx11 \
        libxrender \
        libxext \
        ca-certificates \
        fontconfig \
        freetype \
        ttf-droid \
        ttf-freefont \
        ttf-liberation \
    ;

# Installation de Xdebug
RUN apk add --no-cache $PHPIZE_DEPS \
    && pecl install xdebug-3.2.1 \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /app/