FROM ubuntu

COPY ./sources.list /etc/apt/sources.list

RUN \
	echo "nameserver 223.5.5.5" >> /etc/resolv.conf && \
        apt-get update && \
        apt-get install -y php-fpm && \
        apt-get install -y nginx && \
        apt-get install -y vim && \
        apt-get install -y curl

COPY ./default /etc/nginx/sites-available/default
COPY ./nginx.conf /etc/nginx/nginx.conf

COPY ./log /var/log/nginx
COPY ./html /var/www/html
COPY ./flagggggggggggggg_1s_here /flagggggggggggggg_1s_here


# 添加启动脚本
ADD ./start.sh /start.sh

RUN chmod 755 /start.sh

CMD ["bash","/start.sh"]
