<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => '09'.$faker->numerify('########'),
        'email' => $faker->unique()->safeEmail,
        'dob' => $faker->dateTime('-18 years'),
        'gender' => $faker->randomElement([config('consts.user.gender.female.value'), config('consts.user.gender.male.value')]),
    ];
});
