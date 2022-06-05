- git clone 
- Cài đặt redis
- redis-server
- composer install
- npm install
- cp .env.example .env
- php artisan key:generate
- npm install -g laravel-echo-server
- php artisan migrate --seed
- laravel-echo-server init và thiết lập như hình
![alt text](https://images.viblo.asia/d5e28b10-7d75-454b-ade0-d91dfe406246.png)

<!-- Chạy ứng dụng, mỗi lệnh 1 terminal -->
- redis-server
    nếu gặp lỗi thì chạy lệnh này: 
        + redis-cli ping
        + redis-cli shutdown
- php artisan serve
- npm run watch
- laravel-echo-server start
- php artisan queue:work

