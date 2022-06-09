<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $randomKey = array_rand(config('consts.type'), 1);
    return [
        'name' => $faker->name,
        'type' => config('consts.type')[$randomKey],
        'parent_id' => 0
    ];
});
