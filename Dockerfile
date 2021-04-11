FROM debian:buster-slim

LABEL maintainer = "Tae Min Kim <taemkim@student.42seoul.kr>"

RUN apt-get update && \
	apt-get install -y nginx mariadb-server php-fpm php-mysql wget

COPY srcs/wordpress /etc/nginx/sites-available/wordpress
RUN ln -fs /etc/nginx/sites-available/wordpress /etc/nginx/sites-enabled/default

RUN wget https://wordpress.org/latest.tar.gz && \
	cp latest.tar.gz /var/www/html && rm latest.tar.gz && \
	cd /var/www/html/ && ls && tar -xf latest.tar.gz && rm latest.tar.gz && \
	cd wordpress && cp -r * ../ && rm -rf wordpress index.nginx-debian.html
COPY srcs/wp-config.php /var/www/html/

RUN mkdir ~/mkcert &&\
	cd ~/mkcert &&\
	wget https://github.com/FiloSottile/mkcert/releases/download/v1.4.3/mkcert-v1.4.3-linux-amd64 &&\
	mv mkcert-v1.4.3-linux-amd64 mkcert &&\
	chmod +x mkcert &&\
	./mkcert -install && ./mkcert localhost

COPY srcs/wordpress.sql ./
RUN service mysql start && \
	echo "CREATE DATABASE wordpress; \
	GRANT ALL PRIVILEGES ON wordpress.* TO 'root'@'localhost';\
	update mysql.user set plugin = 'mysql_native_password' where user='root';" | mysql -u root && \
	mysql wordpress -u root --skip-password < wordpress.sql && rm wordpress.sql

RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.0-rc1/phpMyAdmin-5.0.0-rc1-all-languages.tar.gz && \
	mkdir /var/www/html/phpmyadmin && \
	tar xzf phpMyAdmin-5.0.0-rc1-all-languages.tar.gz --strip-components=1 -C /var/www/html/phpmyadmin && \
	rm phpMyAdmin-5.0.0-rc1-all-languages.tar.gz
COPY srcs/config.inc.php /var/www/html/phpmyadmin/

RUN chown -R www-data:www-data /var/www/* && \
	chmod -R 755 /var/www/*

EXPOSE 80 443

CMD service nginx start && \
	service mysql start && \
	service php7.3-fpm start && \
	bash
