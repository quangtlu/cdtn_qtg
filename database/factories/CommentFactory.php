<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => rand(2,99),
        'post_id' => rand(1,99),
        'comment' => $faker->text
    ];
});
