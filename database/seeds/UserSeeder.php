<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => 'Team7',
            'lastname' => 'Boolean',
            'email' => 'boolean.team7@gmail.com',
            'password' => Hash::make('Lorenzo89!'),
            'avatar' => 'https://img.favpng.com/7/5/8/computer-icons-font-awesome-user-font-png-favpng-YMnbqNubA7zBmfa13MK8WdWs8.jpg',
            'date_of_birth' => '1984-04-15',
            'id_role' => 1
        ]);
    }
}
