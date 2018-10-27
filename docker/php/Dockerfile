
FROM php:7.2-fpm

RUN DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -my wget gnupg

# Install dotdeb repo
RUN echo "deb http://packages.dotdeb.org jessie all" > /etc/apt/sources.list.d/dotdeb.list \
    && curl -sS https://www.dotdeb.org/dotdeb.gpg | apt-key add - \
    && apt-get update

# Install required libs
RUN apt-get update && \
    apt-get install -y \
        git \
        unzip \
        libcurl4-openssl-dev \
        libedit-dev \
        libssl-dev \
        libxml2-dev \
        libsqlite3-dev \
        sqlite3 \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        libjudydebian1 \
        libjudy-dev \
        nano \
        procps \
    && apt-get clean

#
# Configure
#
RUN docker-php-ext-configure gd \
        --enable-gd-native-ttf \
        --with-jpeg-dir=/usr/lib \
        --with-freetype-dir=/usr/include/freetype2

#
# Install extensions
#
RUN docker-php-ext-install \
        pdo_mysql \
        pcntl \
        sockets \
        bcmath \
        opcache \
        exif \
        tokenizer \
        gd \
        pcntl

RUN pecl install ev && \
    docker-php-ext-enable ev

RUN pecl install swoole && \
    docker-php-ext-enable swoole


#####################################
#         XDEBUG EXTENSION:
#####################################

ARG ENABLE_XDEBUG=false
RUN if [ ${ENABLE_XDEBUG} = true ]; then \
    # Install the xdebug extension
    git clone https://github.com/xdebug/xdebug.git /tmp/xdebug \
        && cd /tmp/xdebug \
        && phpize \
        && ./configure \
        && make \
        && make install \
        && rm -rf /tmp/xdebug \
;fi


# Copy xdebug configration for remote debugging
ENV XDEBUGINI_PATH=/usr/local/etc/php/conf.d/xdebug.ini
COPY ./xdebug.ini $XDEBUGINI_PATH
RUN echo "xdebug.remote_host="`/sbin/ip route|awk '/default/ { print $3 }'` >> $XDEBUGINI_PATH

#####################################
#        OPCACHE EXTENSION:
#####################################

ARG INSTALL_OPCACHE=false
RUN if [ ${INSTALL_OPCACHE} = true ]; then \
    docker-php-ext-install opcache \
;fi

# Copy opcache configration
COPY ./opcache.ini /usr/local/etc/php/conf.d/opcache.ini


#####################################
#           INTL EXTENSION:
#####################################

ARG INSTALL_INTL=false
RUN if [ ${INSTALL_INTL} = true ]; then \
    # Install intl and requirements
    apt-get update -yqq && \
    apt-get install -y zlib1g-dev libicu-dev g++ && \
    docker-php-ext-configure intl && \
    docker-php-ext-install intl \
;fi

#####################################
#       ImageMagick EXTENSION:
#####################################

USER root
ARG INSTALL_IMAGEMAGICK=false
ENV INSTALL_IMAGEMAGICK ${INSTALL_IMAGEMAGICK}
RUN if [ ${INSTALL_IMAGEMAGICK} = true ]; then \
    apt-get update -y && \
    apt-get install -y libmagickwand-dev imagemagick && \
    pecl install imagick && \
    docker-php-ext-enable imagick \
;fi


#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#

ADD ./laravel.ini /usr/local/etc/php/conf.d
ADD ./php-fpm.conf /usr/local/etc/php-fpm.d

RUN rm -r /var/lib/apt/lists/*
RUN rm -rf /tmp/pear


#####################################
# Composer:
#####################################

# Install composer and add its bin to the PATH.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN echo "" >> ~/.bashrc && \
    echo 'export PATH="/var/www/railt.org/vendor/bin:$PATH"' >> ~/.bashrc

ADD ./bootstrap.sh /bootstrap.sh
RUN chmod 0755 /bootstrap.sh

RUN chmod -R 0777 /var/www

WORKDIR /var/www/railt.org

RUN usermod -u 1000 www-data

EXPOSE 9000

CMD ["/bootstrap.sh"]
