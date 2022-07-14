<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->text,
        'status' => rand(2, 4),
        'user_id' => rand(10,99),
        'image' => '1.jpg|2.jpg|3.jpg',
    ];
});
