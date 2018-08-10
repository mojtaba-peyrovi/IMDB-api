<?php

$factory->define(App\Botox::class, function (Faker\Generator $faker) {
    return [
        "botox_name" => $faker->name,
        "price_per_unit" => $faker->randomNumber(2),
        "price_per_vial" => $faker->randomNumber(2),
        "reward_points" => $faker->randomNumber(2),
        "popular" => 0,
        "apply_btn" => 1,
        "expire" => $faker->date("Y-m-d", $max = 'now'),
        "exclusive" => 0,
        "exclusive_desc" => $faker->name,
        "featured" => 0,
        "featured_desc" => $faker->name,
        "off_peak_available" => 0,
        "about_offpeak" => $faker->name,
        "about_package" => $faker->name,
        "clinic_name_id" => factory('App\Clinic')->create(),
    ];
});
