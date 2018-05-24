FROM phillaf/php-mricg:latest

RUN apt-get update \
        && apt-get install -y mysql-client \
        && apt-get install -y nginx \
        && apt-get install -y libyaml-dev \
        && apt-get install -y vim

COPY composer.json ./
RUN composer install

COPY ./php/php.ini /usr/local/etc/php/
RUN pecl config-set php_ini /usr/local/etc/php/php.ini \
        && pecl install yaml \
        && echo "extension=yaml.so" >> /usr/local/etc/docker-php-ext-yaml.ini

WORKDIR /var/www/html

COPY ./nginx/localhost /etc/nginx/sites-available
RUN ln -s /etc/nginx/sites-available/localhost /etc/nginx/sites-enabled/localhost \
        && nginx -t

COPY index.php .
COPY src ./src

COPY db ./db
COPY phinx.yml .
