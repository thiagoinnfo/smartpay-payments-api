FROM php:8.2-fpm-alpine

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

RUN apk --update add --no-cache \
    $PHPIZE_DEPS \
    bash \
    oniguruma-dev \
    libpng-dev \
    openssl-dev \
    gd \
    nano \
    libxml2-dev \
    postgresql-dev \
    git \
    \
    && rm -rf /var/cache/apk/*

RUN docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        gd \
        soap \
        xml \
        ctype \
        pcntl \
        opcache

COPY ./docker/php/php-fpm/php-fpm.conf /usr/local/etc
COPY ./docker/php/php-fpm/www.conf /usr/local/etc/php-fpm.d

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer;

COPY ./ /app

COPY ./docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh

WORKDIR /app

CMD ["php-fpm", "-F", "-O"]
