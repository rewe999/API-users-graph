<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GeoSeeder extends Seeder
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
            DB::table('geos')->insert([
                'lat' => $faker->latitude,
                'lng' => $faker->longitude,
            ]);
        }
    }
}
