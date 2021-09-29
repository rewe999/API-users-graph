<?php

use App\Models\Address;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'website' => $faker->url,
                'companyId' => Company::all()->random()->id,
                'addressId' => Address::all()->random()->id,
            ]);
        }
    }
}
