<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Onlinecorrection\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Onlinecorrection\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state'=>$faker->state,
        'zipcode'=>$faker->postcode

    ];
});


$factory->define(Onlinecorrection\Models\Project::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});


$factory->define(Onlinecorrection\Models\Package::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'project_id' => 1
    ];
});
