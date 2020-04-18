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
            'avatar' => 'default_images/default_avatar.png',
            'date_of_birth' => '1984-04-15',
            'role_id' => 1
        ]);
    }
}
