FROM php:7.4-fpm-alpine
WORKDIR /app

RUN apk --update upgrade \
    && apk add --no-cache autoconf automake make gcc g++ icu-dev postgresql-dev \
    && pecl install xdebug \
    && docker-php-ext-install -j$(nproc) \
        bcmath \
        opcache \
        intl \
        pdo_pgsql \
    && docker-php-ext-enable \
        opcache

COPY etc/infrastructure/php/ /usr/local/etc/php/
