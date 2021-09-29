<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CompanySeeder extends Seeder
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
            DB::table('companies')->insert([
                'name' => $faker->name,
                'catchPhrase' => $faker->sentence(6),
                'bs' => $faker->sentence(5),
            ]);
        }
    }
}
