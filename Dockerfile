FROM debian:sid
MAINTAINER mohangupta@live.com

ENV DEBIAN_FRONTEND noninteractive

RUN echo "deb http://http.debian.net/debian unstable main" > /etc/apt/sources.list
#RUN echo "deb http://cdn.debian.net/debian unstable main" > /etc/apt/sources.list
RUN apt-get -y update
RUN echo "#!/bin/sh\nexit 0" > /usr/sbin/policy-rc.d
RUN apt-get -y install openssh-server
RUN mkdir -p /var/run/sshd
ADD sshd.conf /etc/supervisor/conf.d/sshd.conf
ADD mysqld.conf /etc/supervisor/conf.d/mysqld.conf 
ADD apache.conf /etc/supervisor/conf.d/apache.conf
RUN echo "root:root" | chpasswd
RUN sed -ri 's/UsePAM yes/#UsePAM yes/g' /etc/ssh/sshd_config
RUN sed -ri 's/#UsePAM no/UsePAM no/g' /etc/ssh/sshd_config
RUN sed -ri 's/PermitRootLogin without-password/PermitRootLogin yes/g' /etc/ssh/sshd_config
RUN service ssh start; service ssh stop

RUN \
    apt-get install -y -q git-core wget curl unzip ;\
    apt-get install -y -q php5 php5-cli php-pear php5-common php5-gd ;\
    apt-get install -y -q apache2 libapache2-mod-php5 ;\
    apt-get install -y -q mysql-client mysql-server php5-mysql ;\
    apt-get install -y -q supervisor ;



#Install Drupal
RUN apt-get install -y php5-curl
RUN \
    curl -sS https://getcomposer.org/installer | php ;\
    mv composer.phar /usr/local/bin/composer ;\
    composer global require drush/drush:dev-master ;\
    composer global update;

RUN ln -sf /.composer/vendor/drush/drush/drush /usr/bin/drush  
#RUN rm -rf /var/www/ ; cd /var ; drush dl -d -y --destination="/var/www" --drupal-project-rename="/var/www"  drupal-8.0.0-beta1 
RUN drush --version
RUN drush dl -y drupal-8 --destination=/var --drupal-project-rename=www -v
#drush sql-create --db-su=root --db-su-pw=root --db-url="mysql://root:root@127.0.0.1/drupal8" --yes
#drush site-install standard --db-url="mysql://root:root@127.0.0.1/drupal8" --account-name=admin -account-pass=password
RUN chmod a+w /var/www/sites/default ; mkdir /var/www/sites/default/files ; chown -R www-data:www-data /var/www/

RUN cp /var/www/sites/default/default.services.yml /var/www/sites/default/services.yml

#MySql
RUN sed -i -e"s/^bind-address\s*=\s*127.0.0.1/bind-address = 0.0.0.0/" /etc/mysql/my.cnf 
ADD createdatabase.sh /createdatabase.sh
RUN chmod 777 /createdatabase.sh
COPY supervisord.conf /etc/supervisor/supervisord.conf
RUN /createdatabase.sh
ADD 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN cd /etc/apache2/mods-enabled  && ln -s ../mods-available/rewrite.load    #a2enmod rewrite
ADD drushmake.sh /drushmake.sh
RUN chmod 777 /drushmake.sh
RUN /drushmake.sh
EXPOSE 22 80
CMD ["/usr/bin/supervisord"]
