#!/bin/bash
set -e

current_branch=$(git symbolic-ref --short HEAD)
if [ "$current_branch" != "master" ]
then
  printf "\nError: Run script on master branch!\n"
  printf "This should ensure that you are running the latest working version.\n\n"
  printf "Currently, you are on branch $current_branch\n\n"
  return
fi

git pull --ff-only

# Start database
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

# 3) Import testing data
cat ./resources/carcada_2018-08-12.sql | docker exec -t carcada_database mysql -uroot carcada

# TODO: Fix generation of seed data
# docker exec -t carcada_app php vendor/bin/phinx seed:run
