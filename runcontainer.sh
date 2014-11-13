#!/bin/bash
set -x
if [ `mount|grep drupal8devel|wc -l` -ne 0  ]
then
/home/mohan/detachdrupal8.sh
fi

if [ `docker ps -a|wc -l` -ne "1"   ]
then
docker rm -f $(docker ps -a -q)
fi
docker run -d -p 8080:80  -p 7224:22 -v /home/mohan/PhpstormProjects/mm/modules/mohan:/var/www/modules/mohan -v /home/mohan/PhpstormProjects/mm/themes/angularmohan:/var/www/themes/angularmohan   mohangupta/mohangupta8
sleep 15
/home/mohan/attachdrupal8.sh
ssh -p 7224 root@localhost
