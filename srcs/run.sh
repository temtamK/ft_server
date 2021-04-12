#!/bin/bash

if [ "${AUTOINDEX}" -eq 0 ] ; then
	cp ./autoindex_off /etc/nginx/sites-available/autoindex_off
	ln -fs /etc/nginx/sites-available/autoindex_off /etc/nginx/sites-enabled/default
else
	cp ./autoindex_on /etc/nginx/sites-available/autoindex_on
	ln -fs /etc/nginx/sites-available/autoindex_on /etc/nginx/sites-enabled/default
fi

service php7.3-fpm start
service mysql start
service nginx start
tail -f /dev/null
