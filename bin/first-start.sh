#!/bin/bash

docker-compose exec app composer update
docker-composer exec app chmod 777 ./web/assets -R
docker-composer exec app chmod 777 ./runtime -R
