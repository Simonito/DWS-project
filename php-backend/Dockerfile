FROM php:8.3-rc-fpm-alpine

RUN apk update && apk add --no-cache postgresql postgresql-dev libzip-dev git zip

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install pdo pdo_pgsql pgsql zip

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    ln -s /usr/local/bin/composer /usr/bin/composer

COPY . /app
WORKDIR /app

RUN composer install

EXPOSE 9000
