<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    $authors = [
        'TS. Trần Tiến Khôi', 
        'TS. Nguyễn Kim Măng CN',
        'Phùng Đức Sơn ThS. Lê Văn Dân',
        'TS. Vũ Linh Chi',
        'PGS. TS Nguyễn Văn Lịch',
        'ThS. Nguyễn Thị Hoa',
        'ThS. Nguyễn Bích Diệp',
        'PGS. TS Nguyễn Cảnh Toàn',
        'Hoàng Tuỵ',
        'Nguyễn Văn Khuê',
        'Nguyễn Xuân My',
        'Ngô Thị Thu Hiền',
        'Phạm Huy Điển',
        'Đoàn Quỳnh',
        'Đặng Hùng Thắng', 
        'Trần Nam Dũng',
        'Phạm Huy Điển',
        'Tổng chủ biên',
        'Nguyễn Thị Hải',
        'Nguyễn Thị Kim Dung',
        'Phạm Huy Dũng', 
        'Phạm Huy Tuấn Kiệt',
        'Nguyễn Nguyên Ngọc',
        'Sa Phương Băng', 
        'Sa Trọng Kiên', 
        'Quàng Văn An',
        'Đặng Thị Hồng Nhung', 
        'Trương Hồng Lĩnh',
        'Nguyễn Thị Hà Phương',
        'Nguyễn Thị Huyền Trang', 
        'Lê Thị Mỹ Quyên', 
        'Đào Xuân Vinh', 
        'Hà Minh Trang',
        'Bạch Thị Lan Anh', 
        'Đào Xuân Vinh',
        'Nguyễn Thị Kim Thoa', 
    ];
    return [
        'name' => $faker->randomElement($authors),
        'phone' => '09'.$faker->numerify('########'),
        'email' => $faker->unique()->safeEmail,
        'dob' => $faker->dateTime('-18 years'),
        'gender' => $faker->randomElement([config('consts.user.gender.female.value'), config('consts.user.gender.male.value')]),
    ];
});
