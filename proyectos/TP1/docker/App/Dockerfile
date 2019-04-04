# Version: 1.0
FROM php:7.3-apache

ADD php.ini /usr/local/etc/php/

RUN apt update && apt install nano

RUN docker-php-ext-install mysqli pdo_mysql && a2enmod rewrite
