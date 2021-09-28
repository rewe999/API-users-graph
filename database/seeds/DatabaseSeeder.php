<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             GeoSeeder::class,
             CompanySeeder::class,
             AddressSeeder::class,
             UserSeeder::class,
             PostSeeder::class,
         ]);
    }
}
