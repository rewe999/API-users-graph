<?php

use App\Models\Geo;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index){
            DB::table('addresses')->insert([
                'street' => $faker->streetName,
                'suite' => $faker->streetAddress,
                'city' => $faker->city,
                'zipcode' => $faker->postcode,
                'geoId' => Geo::all()->random()->id,
            ]);
        }
    }
}
