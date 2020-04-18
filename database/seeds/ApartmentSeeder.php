<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use Faker\Generator as Faker;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartment = new Apartment;
        $apartment->user_id = 1;
        $apartment->title = 'Trilocale fantastico';
        $apartment->description = 'Lorem ipsum dolor sit amet';
        $apartment->rooms_number = 3;
        $apartment->beds_number = 2;
        $apartment->bathrooms_number = 1;
        $apartment->size = 90;
        $apartment->address = 'via Roma, 118 - Sanremo (IM)';
        $apartment->latitude = 43.81667;
        $apartment->longitude = 7.77773;
        $apartment->featured_image = 'default_images/default_apartment.jpg';
        $apartment->price = 50.00;
        $apartment->visible = true;
        $apartment->save();

        for ($i = 0; $i < 9; $i++) {
            $apartment = new Apartment;
            $apartment->user_id = 1;
            $apartment->title = $faker->sentence();
            $apartment->description = $faker->paragraph();
            $apartment->rooms_number = rand(1, 5);
            $apartment->beds_number = rand(1, 5);
            $apartment->bathrooms_number = rand(1, 5);
            $apartment->size = rand(30, 150);
            $apartment->address = $faker->address();
            $apartment->latitude = $faker->latitude($min = -90, $max = 90);
            $apartment->longitude = $faker->longitude($min = -180, $max = 180);
            $apartment->featured_image = 'default_images/default_apartment.jpg';
            $apartment->price = rand(50, 100);
            $apartment->visible = true;
            $apartment->save();
        }
    }
}
