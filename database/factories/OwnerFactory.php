<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Owner;
use Faker\Generator as Faker;

$factory->define(Owner::class, function (Faker $faker) {
    $owners = [
        'Tạp chí Ngôn ngữ (2006)',
        'Tạp chí Hán Nôm (2009)',
        'Tạp chí Hán Nôm (2012)',
        'Tạp chí Từ điển và Bách khoa toàn thư (2012)',
        'NXB Từ điển bách khoa (2009)',
        'Kỷ yếu khoa học Trường Đại học Thăng Long (2013 – 2014)',
        'Tạp chí Truyền thống và phát triển (2014)',
        'NXB Thanh Hóa (2017)',
        'Kỷ yếu hội nghị Khoa học trường Đại học Thăng Long (2018 – 2019)',
        'Tạp chí Khoa học Ngoại ngữ (12/2014)',
        'Tạp chí Ngôn ngữ và đời sống (2/2015)',
        'Tạp chí Từ điển học và Bách khoa thư (11/2017)',
        'Kỷ yếu Hội thảo khoa học Trường Cao đẳng Phòng cháy chữa cháy năm 2019',
        'Kỷ yếu Hội thảo khoa học quốc tế Trường ĐH Vân Tảo (Đài Loan) năm 2019',
        'Tạp chí Ngôn ngữ và đời sống (2019)',
        'Tạp chí Ngôn ngữ và đời sống (2020)',
        'NXB Đại học Quốc gia Hà Nội (2019',
        'Viện Từ điển học và Bách khoa thư Việt Nam (2020)',
        'NXB. Khoa học xã hội, Hà Nội (2009)',
        'NXB Lao động, Hà Nội (2011)',
        'Khóa luận tốt nghiệp (1987)',
        'Tạp chí Ngôn ngữ và Đời sống, số 4 (1998)',
        'Kỉ yếu Ngữ học trẻ (2000)',
        'Tạp chí Ngôn ngữ và đời sống, số 4 (2000)',
        'Kỷ yếu Ngữ học trẻ (2001)',
        'Sách: “Những vấn đề ngôn ngữ học”, Viện Ngôn ngữ học (2002)',
        'Kỷ yếu Ngữ học trẻ (2002)',
        'Kỉ yếu Ngôn ngữ học Hà Nội (2002)',
        'Tạp chí Ngôn ngữ, số 9 (2003)',
        'Tạp chí Ngôn ngữ và đời sống, số 8 (2003)',
        'In trong “Những vấn đề ngôn ngữ học”, Nxb. KHXH (2003)',
        'In trong “Những vấn đề ngôn ngữ học”, Nxb KHXH (2004)',
        'Tạp chí Văn hoá dân gian, số 6 (2006)',
        'Tạp chí Nguồn trong dân gian, số 1 (2009)',
        'Tạp chí Ngôn ngữ và Đời sống, số 1+2 (2010)',

    ];

    return [
        'name' => $faker->randomElement($owners),
        'email' => $faker->email,
        'phone' => '09'.$faker->numerify('########'),
    ];
});
