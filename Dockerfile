FROM debian:wheezy
MAINTAINER mohangupta@live.com

ENV DEBIAN_FRONTEND noninteractive

RUN echo "deb http://http.debian.net/debian wheezy main" > /etc/apt/sources.list
RUN apt-get -y update
RUN echo "#!/bin/sh\nexit 0" > /usr/sbin/policy-rc.d
RUN apt-get -y install openssh-server
RUN mkdir -p /var/run/sshd
ADD sshd.conf /etc/supervisor/conf.d/sshd.conf
ADD mysqld.conf /etc/supervisor/conf.d/mysqld.conf 
ADD apache.conf /etc/supervisor/conf.d/apache.conf
RUN echo "root:root" | chpasswd

RUN \
    apt-get install -y -q git-core  wget  unzip ;\
    apt-get install -y -q php5 php5-cli php-pear php5-common php5-gd ;\
    apt-get install -y -q apache2 libapache2-mod-php5 ;\
    apt-get install -y -q mysql-client mysql-server php5-mysql ;\
    apt-get install -y -q supervisor ;

RUN \
    pear channel-discover pear.drush.org && pear install drush/drush ;\
    drush cache-clear drush ;

#Install Drupal
RUN rm -rf /var/www/ ; cd /var ; drush dl drupal ; mv /var/drupal*/ /var/www/
RUN chmod a+w /var/www/sites/default ; mkdir /var/www/sites/default/files ; chown -R www-data:www-data /var/www/

#MySql
RUN sed -i -e"s/^bind-address\s*=\s*127.0.0.1/bind-address = 0.0.0.0/" /etc/mysql/my.cnf 
ADD createdatabase.sh /createdatabase.sh
RUN chmod 777 /createdatabase.sh
RUN /createdatabase.sh
ADD 000-default /etc/apache2/conf.d/sites-available/000-default
RUN cd /etc/apache2/mods-enabled  && ln -s ../mods-available/rewrite.load

EXPOSE 22 80
CMD /usr/bin/supervisord -n 
