FROM php:5.4-fpm

COPY ./sources.list /etc/apt/sources.list

RUN \
	echo "nameserver 223.5.5.5" >> /etc/resolv.conf && \
	apt-get update && \
        apt-get install -y nginx

COPY ./default /etc/nginx/sites-available/default
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./start.sh /start.sh

COPY ./flag /flag
COPY ./log /var/log/nginx
COPY ./html /var/www/html

CMD ["bash", "/start.sh"]
