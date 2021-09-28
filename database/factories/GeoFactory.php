<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Geo;
use Faker\Generator as Faker;

$factory->define(Geo::class, function (Faker $faker) {
    return [
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
    ];
});
