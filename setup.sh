#!/bin/bash
set -e

# Todo: check if containers exists or if they are running

# Start database
# Todo: expose port to allow external connections
docker run --name carcada_database -e MYSQL_ALLOW_EMPTY_PASSWORD=true -d mysql:5.7.22

# Prepare backend image
docker build -t carcada_backend .

# Launch backend and link databse
docker run --link carcada_database:mysql -p7070:80 --name carcada_backend -d carcada_backend
# Start nginx service
docker exec -t carcada_backend nginx

# Bootstrap database
docker exec -t carcada_backend mysql -h carcada_database -e 'CREATE DATABASE carcada;'
docker exec -t carcada_backend php backend/vendor/bin/phinx migrate -e development
# Todo: run seeder
# docker exec -t carcada_backend php vendor/bin/phinx seed:run

