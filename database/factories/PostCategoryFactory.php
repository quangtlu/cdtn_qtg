<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PostCategory;
use Faker\Generator as Faker;

$factory->define(PostCategory::class, function (Faker $faker) {
    return [
        'post_id' => rand(1,100),
        'category_id' => rand(2,20)
    ];
});
