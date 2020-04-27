<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Message;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++){
            $message = new Message;
            $message->apartment_id = Apartment::all()->random()->id;
            $message->email = $faker->email;
            $message->content = $faker->paragraph();
            $message->save();
        }
    }
}
