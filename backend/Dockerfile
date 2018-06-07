FROM php:7.1.17-fpm-jessie

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN requirements="libicu-dev libicu52" \
    && requirementsToRemove="libmcrypt-dev" \
    && apt-get update && apt-get install -y $requirements \
    && docker-php-ext-install intl \
    && apt-get purge --auto-remove -y $requirementsToRemove \
    && rm -rf /var/lib/apt/lists/*

# Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

# Zip
RUN requirements="unzip zlib1g-dev" \
    && requirementsToRemove="zlib1g-dev" \
    && apt-get update && apt-get install -y $requirements \
    && docker-php-ext-install zip \
    && apt-get purge \
    && rm -rf /var/lib/apt/lists/*

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
        && nginx -t \
        && echo "daemon off;" >> /etc/nginx/nginx.conf \
        && echo "error_log /dev/stdout info;" >> /etc/nginx/nginx.conf

COPY index.php .
COPY src ./src

COPY db ./db
COPY phinx.yml .

ENTRYPOINT [ "/usr/sbin/nginx" ]
