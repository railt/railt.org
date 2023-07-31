FROM php:8.2-fpm
WORKDIR "/home/railt/railt.org"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update

# ------------------------------------------------------------------------------
# Installation Dependencies
# ------------------------------------------------------------------------------

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
      libzip-dev \
      libicu-dev \
      git \
      curl

# Igbinary
RUN pecl install igbinary
RUN docker-php-ext-enable igbinary

# INTL
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl

# APCU
RUN pecl install apcu
RUN docker-php-ext-enable apcu

# Zip
RUN docker-php-ext-install zip
RUN docker-php-ext-enable zip

# Opcache
RUN docker-php-ext-install opcache

# Sockets
RUN docker-php-ext-install sockets

# Composer
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

# ------------------------------------------------------------------------------
# Cleanup Dependencies
# ------------------------------------------------------------------------------

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && ln -sf /usr/share/zoneinfo/Europe/Moscow /etc/localtime
