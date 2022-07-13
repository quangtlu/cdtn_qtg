<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => '09'.$faker->numerify('########'),
        'dob' => $faker->dateTime('-18 years'),
        'email' => $faker->unique()->safeEmail,
        'gender' => 'Nam',
        'image' => 'avatar-nam.jpg',
        'password' => Hash::make('password'),

    ];
});
