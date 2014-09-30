#!/bin/bash
/usr/bin/supervisord
sleep 30
ps aux|grep mysql
echo "create database drupal..."
mysql -u root -e "CREATE DATABASE drupal; GRANT ALL ON drupal.* TO 'root'@'localhost'"
cd /var/www
drush site-install standard -y --account-name=admin --account-pass=admin --db-url="mysql://root@localhost:3306/drupal"
echo "hopefully does this after"
exit 0
