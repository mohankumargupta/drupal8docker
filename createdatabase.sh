#!/bin/bash
ps aux|grep mysql
#/usr/bin/supervisord -c /etc/supervisor/supervisord.conf
apache2ctl start
service mysql start

ps aux|grep mysql
echo "create database drupal..."
mysql -u root -e "CREATE DATABASE drupal; GRANT ALL ON drupal.* TO 'root'@'localhost'"
cd /var/www
drush site-install standard -y --account-name=admin --account-pass=admin --db-url="mysql://root@localhost:3306/drupal"
echo "hopefully does this after"
drush cr
drush cr
exit 0
