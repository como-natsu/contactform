FROM php:7.4.9-fpm

COPY php.ini /usr/local/etc/php/

RUN apt update \
    && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
    && docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

ARG UID=1000
ARG GID=1000

RUN groupadd -g ${GID} appgroup \
    && useradd -m -u ${UID} -g ${GID} appuser

RUN chown -R appuser:appgroup /var/www

USER appuser

WORKDIR /var/www



# FROM php:7.4.9-fpm

#COPY php.ini /usr/local/etc/php/

#RUN apt update \
#    && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
#    && docker-php-ext-install pdo_mysql zip

#RUN curl -sS https://getcomposer.org/installer | php \
#    && mv composer.phar /usr/local/bin/composer \
#    && composer self-update

#WORKDIR /var/www