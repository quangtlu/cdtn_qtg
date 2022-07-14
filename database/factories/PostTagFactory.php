<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PostTag;
use Faker\Generator as Faker;

$factory->define(PostTag::class, function (Faker $faker) {
    return [
        'post_id' => rand(1,100),
        'tag_id' => rand(1,20)
    ];
});
