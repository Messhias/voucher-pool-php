#!/bin/bash

clear

echo "Installing your application."

echo "Hi, $USER"

cd backend

echo "Installing containers."
docker build .

echo "Installing backend and running tests."
cd composer install && cp .env.example .env && php artisan migrate && ./vendor/bin/phpunit
cd ..

# echo "Installing frontend."
# cd frontend && npm install
# cd ..
#
# clear
#
# echo "Installed successful!!"
echo "Running your application..."

cd backend

docker-compose up -d

# cd frontend && npm start
