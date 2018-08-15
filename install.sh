#!/bin/bash

clear

#if you having problems with your composer path
export PATH="$HOME/.composer/vendor/bin:$PATH"

echo "Installing your application."

echo "Hi, $USER"

cd backend

docker-compose up -d
echo "Installing containers."

echo "Installing backend and running tests and seeders."
composer install && cp .env.example .env && docker exec -it mainphp php artisan migrate && docker exec -it mainphp php artisan db:seed && ./vendor/bin/phpunit
cd ..

# echo "Installing frontend."
# cd ..
#
# clear
#
# echo "Installed successful!!"
echo "Running your application..."
# cd frontend && npm install

# cd frontend && npm start
