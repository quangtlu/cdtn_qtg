<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'description' => $faker->text,
        'image' => '1.jpg|2.jpg|3.jpg',
        'pub_date' => $faker->dateTime('-2 years'),
        'regis_date' => $faker->dateTime('-2 years'),
        'owner_id' => rand(1,20)
    ];
});
