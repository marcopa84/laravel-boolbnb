<?php

use Illuminate\Database\Seeder;
use App\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newApartment = new Apartment;
        $newApartment->id_user = 1;
        $newApartment->title = 'Trilocale fantastico';
        $newApartment->description = 'Lorem ipsum dolor sit amet';
        $newApartment->rooms_number = 3;
        $newApartment->beds_number = 2;
        $newApartment->bathrooms_number = 1;
        $newApartment->size = 90;
        $newApartment->address = 'via Roma, 118 - Sanremo (IM)';
        $newApartment->latitude = 43.81667;
        $newApartment->longitude = 7.77773;
        $newApartment->featured_image = 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/living-room-9-1537479929.jpg';
        $newApartment->price = 50.00;
        $newApartment->visible = true;
        $newApartment->save();
    }
}
