<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Owner;
use Faker\Generator as Faker;

$factory->define(Owner::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => '09'.rand(100000000, 999999999),
    ];
});
