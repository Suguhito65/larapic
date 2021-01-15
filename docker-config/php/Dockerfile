FROM php:7.2-fpm
COPY php.ini /usr/local/etc/php/

# install composer
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# install packages
RUN apt-get update \
  && apt-get install -y \
    gcc \
    make \
    libpng-dev \
    git \
    unzip \
    vim \
    libmcrypt-dev \
    mariadb-client \
    curl \
    gnupg \
    openssl \
    zlib1g-dev \ 
    && docker-php-ext-install pdo_mysql mysqli mbstring zip

# install stable node and latest npm
RUN curl -sL https://deb.nodesource.com/setup_10.x | bash
RUN apt-get install -y nodejs

# install xdebug
RUN pecl install xdebug-2.7.2 && docker-php-ext-enable xdebug

WORKDIR /var/www
ADD . /var/www
RUN chown -R www-data:www-data /var/www