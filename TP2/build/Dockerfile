# Version: 1.0
FROM php:7.3-apache

# Pisamos el virtualhost con el nuestro.
ADD 000-default.conf /etc/apache2/sites-enabled

# Instalar algunos programas para el contenedor.
RUN apt-get update && apt install -y curl git wget vim unzip

# Instalar las extensiones de PHP.
RUN apt-get update && \
    apt-get install -y libpng-dev
RUN apt-get update && \
    apt-get install -y libmagickwand-dev --no-install-recommends && \
    pecl install imagick && \
    docker-php-ext-enable imagick
RUN apt-get update && \
    apt-get install -y zlib1g-dev libmcrypt-dev
RUN docker-php-ext-install mysqli 
RUN docker-php-ext-install bcmath 
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring
RUN apt-get install -y libzip-dev && \ 
    docker-php-ext-install zip
RUN docker-php-ext-install soap
RUN apt-get update && apt-get install -y libwebp-dev libxpm-dev && \
    docker-php-ext-configure gd --with-gd --with-webp-dir --with-jpeg-dir \
    --with-png-dir --with-zlib-dir --with-xpm-dir --with-freetype-dir \
    --enable-gd-native-ttf
RUN docker-php-ext-install gd
RUN apt-get update && \
    apt-get install -y libxslt-dev && \
    docker-php-ext-install xsl
RUN docker-php-ext-install intl

# Instalar composer a nivel global dentro del contenedor.
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

# Habilitar el motor de reescritura de URLs de apache
RUN a2enmod rewrite