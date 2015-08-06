#!/bin/bash

#Import mysql database
mysql -usummer -pcamp ezobjwrapper < installation/ezobjwrapper_db_dump.sql

#Install sf vendors
composer install --no-dev -n

#copy legacy settings, storage and autoloads
cp -R installation/ezpublish_legacy/settings/override ezpublish_legacy/settings/
cp -R installation/ezpublish_legacy/settings/siteaccess/site_admin ezpublish_legacy/settings/siteaccess/
cp -R installation/ezpublish_legacy/settings/siteaccess/eng ezpublish_legacy/settings/siteaccess/
cp -R installation/ezpublish_legacy/var/ezdemo_site ezpublish_legacy/var/

cd ezpublish_legacy && php bin/php/ezpgenerateautoloads.php

cd ../

php ezpublish/console assets:install --symlink --relative
php ezpublish/console assetic:dump --env=prod web
php ezpublish/console cache:clear --no-warmup