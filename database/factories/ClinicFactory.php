<?php

$factory->define(App\Clinic::class, function (Faker\Generator $faker) {
    return [
        "clinic_name" => $faker->name,
        "city" => $faker->name,
        "area" => $faker->name,
    ];
});
