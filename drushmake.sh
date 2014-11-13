#!/bin/bash
#/usr/bin/supervisord
apache2ctl start
service mysql start
cd /var/www
drush dl drupalmoduleupgrader-8.x-0.7
drush en -y drupalmoduleupgrader
cd /var/www
COMPOSER_BIN_DIR=bin composer require --dev drupal/console:@stable
cd /var/www/modules 
git clone https://github.com/alexrayu/angulars
drush en  -y angulars
exit 0
