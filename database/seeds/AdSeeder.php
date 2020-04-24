<?php

use Illuminate\Database\Seeder;
use App\Ad;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hours=[24,72,144];
        $prices=[2.99,5.99,9.99];

        for ($i=0; $i < 3; $i++) { 
            $ad = new Ad;
            $ad->hours= $hours[$i];
            $ad->price= $prices[$i];
            $ad->save();
        }
    }
}
