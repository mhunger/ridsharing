#!/bin/bash
set -e

########## DISCLAIMER: ##########
######### Run only once #########

# Start database
# TODO: expose port to allow external connections
docker run --name carcada_database -e MYSQL_ALLOW_EMPTY_PASSWORD=true -p6033:3306 -d mysql:5.7.22

# Prepare backend image
docker build -t carcada_app .

# Launch application container and link database
docker run --link carcada_database:mysql -p7070:80 --name carcada_app -d carcada_app

# Bootstrap database by
# 1) creating a database
docker exec -t carcada_app mysql -h carcada_database -e 'CREATE DATABASE carcada;'
# 2) scaffolding tables
docker exec -t carcada_app php /var/www/html/backend/vendor/bin/phinx migrate -e development
# TODO: run seeder to create mock data
# docker exec -t carcada_app php vendor/bin/phinx seed:run

