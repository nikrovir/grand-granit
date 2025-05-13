#!/bin/bash

rm .env
cp .env."$1" .env

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs --no-scripts --prefer-dist -o

bash ./vendor/bin/sail build
bash ./vendor/bin/sail up -d

if [[ "$1" =~ ^(dev|example)$ ]]; then
    bash ./vendor/bin/sail composer install
    bash ./vendor/bin/sail artisan config:clear
    bash ./vendor/bin/sail artisan route:clear
    bash ./vendor/bin/sail artisan view:clear
    bash ./vendor/bin/sail artisan cache:clear
else
    bash ./vendor/bin/sail composer install --ignore-platform-reqs --prefer-dist -o
    bash ./vendor/bin/sail artisan config:cache
    bash ./vendor/bin/sail artisan route:cache
    bash ./vendor/bin/sail artisan view:cache
fi

bash ./vendor/bin/sail artisan storage:link --relative
