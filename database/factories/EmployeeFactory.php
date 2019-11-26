<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\employee;
use App\company;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company' => factory(App\company::class)->create()->id,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
    ];
});