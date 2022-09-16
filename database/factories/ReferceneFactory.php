<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reference;
use Faker\Generator as Faker;

$factory->define(Reference::class, function (Faker $faker) {
    static $stt = 1;
    return [
        'title' => 'Tài liệu tham khảo '.$stt++,
        'url' => $faker->url,
        'description' => $faker->text()
    ];
});
