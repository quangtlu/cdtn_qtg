- git clone git@gitlab.com:quangtlu/qtg.git
- config database trong .env 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qtg
DB_USERNAME=root
DB_PASSWORD=

- Khởi chạy XAMPP
- Tạo cơ sở dữ liệu qtg trên sever
- php artisan migrate --seed
- php artisan serve