<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'student_id' => $faker->numberBetween($min = 100000, $max = 999999),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->email
    ];
});
