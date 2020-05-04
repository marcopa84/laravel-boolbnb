<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\View;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5000; $i++) { 
            $view = new View;
            $view->apartment_id = rand(1,5);
            // $view->apartment_id = 1;
            $view->date = Carbon::create('2020', rand(1,4), rand(1,29));
            $view->save();
        }
    }
}
