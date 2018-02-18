FROM robostlund/nginx-php-mysql-static

RUN rm -rf /data/var/www/html/public_html/*
COPY ./carcada /data/var/www/html/public_html/carcada
COPY ./web /data/var/www/html/public_html/web
COPY ./composer.json /data/var/www/html/public_html


