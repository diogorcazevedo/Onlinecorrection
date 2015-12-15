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
        'description' => $faker->sentence,
        'qtd' => $faker->randomDigitNotNull
    ];
});



$factory->define(Onlinecorrection\Models\Document::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'project_id' => 1,
        'status' => 0
    ];
});


$factory->define(Onlinecorrection\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'client_id' => rand(1,10),
        'total' => rand(50,100),
        'status' => 0

    ];
});



$factory->define(Onlinecorrection\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [

    ];
});

