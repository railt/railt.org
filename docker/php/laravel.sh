#!/bin/bash

cd /var/www

# =====================================================
#   Set permissions for web site
# =====================================================

chown www-data:www-data ./railt.org/storage -R
chmod 0777 ./railt.org/storage

chown www-data:www-data ./railt.org/bootstrap/cache -R
chmod 0777 ./railt.org/bootstrap/cache

mkdir -p /var/www/.composer
chmod 0777 /var/www/.composer

# =====================================================
#   Build web site
# =====================================================

cd /var/www/railt.org

cp -n .env.example .env

usermod -u 1000 www-data


# =====================================================
#   RUN
# =====================================================

composer install

php ./artisan key:generate
php ./artisan app:fresh

php-fpm
