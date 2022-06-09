<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => '09'.rand(100000000, 999999999),
        'email' => $faker->unique()->safeEmail,
        'dob' => now(),
        'gender' => ['nam', 'nữ'][rand(0,1)],
    ];
});
