<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use App\Models\Geo;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetName,
        'suite' => $faker->streetAddress,
        'city' => $faker->city,
        'zipcode' => $faker->postcode,
        'geoId' => Geo::all()->random()->id,
    ];
});
