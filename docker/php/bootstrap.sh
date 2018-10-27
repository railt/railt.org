#!/bin/bash

cd /var/www

# =====================================================
#   Set permissions for web site
# =====================================================

chown www-data:www-data /var/www/railt.org/storage -R
chmod 0777 /var/www/railt.org/storage

chown www-data:www-data /var/www/railt.org/bootstrap/cache -R
chmod 0777 /var/www/railt.org/bootstrap/cache

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
php ./artisan migrate:fresh --seed

echo -e "
                 ___====-_  _-====___
           _--^^^#####//      \\#####^^^--_
        _-^##########// (    ) \\##########^-_
       -############//  |\^^/|  \\############-
     _/############//   (@::@)   \\############\_
    .#############((     \\//     ))#############.
   -###############\\    (oo)    //###############-
  -#################\\  / VV \  //#################-
 -###################\\/      \//###################-
_#/|##########/\######(   /\   )######/\##########|\#_
|/ |#/\#/\#/\/  \#/\##\  |  |  /##/\#/  \/\#/\#/\#| \|
'  |/  V  V  '   V  \#\| |  | |/#/  V   '  V  V  \|  '
   '   '  '      '   / | |  | | \   '      '  '   '
                    (  | |  | |  )
                   __\ | |  | | /__
                  (vvv(VVV)(VVV)vvv)

              RAILT.ORG IS READY TO WORK
                   HERE BE DRAGONS!
"

php-fpm
