<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AuthorProduct;
use Faker\Generator as Faker;

$factory->define(AuthorProduct::class, function (Faker $faker) {
    return [
        'author_id' => rand(1,50),
        'product_id' => rand(1,50)
    ];
});
