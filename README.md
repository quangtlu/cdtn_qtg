Cài đặt:
- git clone 
- Cài đặt laragon, khởi chạy server mysql và redis
- cp .env.example .env
- composer install
- npm install
- php artisan key:generate
- php artisan migrate:fresh --seed
- laravel-echo-server init và thiết lập như hình
![alt text](https://images.viblo.asia/d5e28b10-7d75-454b-ade0-d91dfe406246.png)


Chạy ứng dụng:
 *Cách 1: $ sh run-app.sh

 *Cách 2: Mỗi lệnh 1 terminal:
- php artisan serve
- npm run watch
- laravel-echo-server start (Nếu có lỗi thì Đăng nhập trước khi chạy)
- php artisan queue:work

-----------------------------
Account trong file seed:
 - password chung: 'password'
 - admin: admin@gmail.com
 - mod: mod@gmail.com
 - editor: editor@gmail.com
 - counselor: counselor@gmail.com
