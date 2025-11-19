FROM php:8.4-cli-alpine

COPY php.ini /usr/local/etc/php/php.ini

RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && apk add --no-cache linux-headers

RUN pecl install xdebug  \
    && docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

COPY . /app
