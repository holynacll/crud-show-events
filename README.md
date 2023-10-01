## to run (require docker and docker compose)
git clone this-repo

mkdir this-repo

docker run --rm --interactive --tty \
  --volume $PWD:/app \
  composer install

./vendor/bin/sail up -d

docker compose exec laravel.test bash

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed

chmod 0775 -R storage/ database/ bootstrap/

npm i

npm run dev

url: http://localhost