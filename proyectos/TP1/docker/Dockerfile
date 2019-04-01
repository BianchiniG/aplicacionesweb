FROM php:7.3-apache

RUN apt-get install -y php7.3-mysql && docker-php-ext-enable mysqli
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"