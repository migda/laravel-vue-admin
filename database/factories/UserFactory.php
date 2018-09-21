<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'role_id' => $faker->randomElement(App\Models\User::roles()),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'country_id' => function () {
            return factory(App\Models\Country::class)->create()->id;
        }
    ];
});


$factory->define(App\Models\Country::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});