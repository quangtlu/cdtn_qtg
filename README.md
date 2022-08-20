Cài đặt:
- git clone 
- Cài đặt laragon, khởi chạy server mysql và redis
*Cách 1:
- composer install
- npm install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- laravel-echo-server init và thiết lập như hình
![alt text](https://images.viblo.asia/d5e28b10-7d75-454b-ade0-d91dfe406246.png)

* Cách 2:
$ sh init.sh
và thiết lập laravel-echo-server như hình cách 1
--------------------------------------------------------------------
Chạy ứng dụng:
 *Cách 1: $ sh run-app.sh

 *Cách 2: 
 Mỗi lệnh 1 terminal:
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
