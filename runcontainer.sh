#!/bin/bash
docker run -d -p 8080:80 -p 9000:9000 -p 7224:22 -v /home/mohan/docker/mohandrupal8/mohan:/var/www/modules/mohan mohangupta/mohangupta8
