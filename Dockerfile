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

RUN mkdir /var/www/html/backend
WORKDIR /var/www/html/backend

COPY backend/composer.json ./
RUN composer install

COPY ./php/php.ini /usr/local/etc/php/
RUN pecl config-set php_ini /usr/local/etc/php/php.ini \
        && pecl install yaml \
        && echo "extension=yaml.so" >> /usr/local/etc/docker-php-ext-yaml.ini

COPY ./nginx/localhost /etc/nginx/sites-available
RUN ln -s /etc/nginx/sites-available/localhost /etc/nginx/sites-enabled/localhost \
        && nginx -t \
        && echo "error_log /dev/stdout info;" >> /etc/nginx/nginx.conf

COPY backend/index.php .
COPY backend/src ./src

COPY backend/db ./db
COPY backend/phinx.yml .

COPY run_services.sh /run_services.sh

RUN ls -la / \
    && chmod 777 /run_services.sh

CMD /run_services.sh
