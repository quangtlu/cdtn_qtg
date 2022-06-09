<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => '09'.rand(100000000, 999999999),
        'dob' => now(),
    ];
});
