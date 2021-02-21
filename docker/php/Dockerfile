FROM php:8.0.2-fpm-buster

RUN pecl install xdebug-3.0.2 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable pdo_mysql \
    && apt-get -y update \
    && apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

COPY docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini