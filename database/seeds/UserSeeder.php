<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('ahmad123')
        ]);

        User::create([
            'name' => 'budi',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('budi123')
        ]);

        User::create([
            'name' => 'lukman',
            'email' => 'lukman@gmail.com',
            'password' => Hash::make('lukman123')
        ]);

        User::create([
            'name' => 'kevin',
            'email' => 'kevin@gmail.com',
            'password' => Hash::make('kevin123')
        ]);
    }
}
