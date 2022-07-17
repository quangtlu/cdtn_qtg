redis-server &
composer dump-autoload & 
npm install &
cp .env.example .env &
php artisan key:generate &
npm install -g laravel-echo-server &
php artisan migrate --seed &
laravel-echo-server init &