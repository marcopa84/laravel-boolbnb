<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Message;
use Illuminate\Support\Carbon;
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
            $message->apartment_id = rand(1,5);
            $message->email = $faker->email;
            $message->content = $faker->paragraph();
            $message->created_at = Carbon::create('2020', rand(1,4), rand(1,29)/* , rand(0,23), rand(0,59), rand(0,59) */);
            $message->save();
        }
    }
}
