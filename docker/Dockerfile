FROM php:8.2.3-fpm-alpine

WORKDIR /var/www
ARG USER_ID=1000

COPY --chown=www-data:www-data src .

RUN apk update && apk add --no-cache \
    shadow zip unzip git oniguruma-dev autoconf openssh icu-dev libzip-dev libxml2-dev libxslt-dev g++ make libpng-dev supervisor && \
    pecl install pcov && \
    docker-php-ext-install pdo_mysql mysqli bcmath intl xsl zip xml gd && \
    docker-php-ext-enable pcov && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install && \
    usermod -u $USER_ID www-data


RUN echo 'memory_limit = 1024M;' > /usr/local/etc/php/conf.d/docker-php-ext-add-memory.ini
USER www-data

EXPOSE 9000
CMD ["php-fpm"]