<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        // 'phone' => $faker->PhoneNumber,
        // 'status' => rand(0,1),
        'password' => app('hash')->make('123'),
    ];
});
