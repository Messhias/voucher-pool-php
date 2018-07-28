#!/bin/bash

clear

echo "Installing your application."

echo "Hi, $USER"

cd backend

docker-compose up -d
echo "Installing containers."
docker build .

clear

echo "Installing backend and running tests and seeders."
cd composer install && cp .env.example .env && docker exec -it voucher_pool_php php artisan migrate && docker exec -it voucher_pool_php php artisan db:seed && ./vendor/bin/phpunit
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
