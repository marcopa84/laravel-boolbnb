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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(ApartmentSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(ApartmentFeatureSeeder::class);
        $this->call(AdSeeder::class);
        $this->call(ViewSeeder::class);
    }
}
