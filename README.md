## Project Setup

```sh
docker-compose up
docker-compose exec -u 1000:1000 php-web bash

composer install
cp .env.example .env
php artisan key:generate
chmod -R 777 storage bootstrap/cache

php artisan migrate:fresh
php artisan db:seed
```