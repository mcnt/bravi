cd api/

cp .env.example .env

cd ../

docker compose up -d

docker exec bravi_api composer install

docker exec bravi_api php artisan key:generate

docker exec bravi_api php artisan migrate
