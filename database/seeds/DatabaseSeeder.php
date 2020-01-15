<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Simple User 1
        User::create([
            'email' => 'simpleuser1@tdb.com',
            'password' => Hash::make('password'),
            'type' => 0
        ]);

        // Simple User 2
        User::create([
            'email' => 'simpleuser2@tdb.com',
            'password' => Hash::make('password'),
            'type' => 0
        ]);

        // Production User
        User::create([
            'email' => 'production@tdb.com',
            'password' => Hash::make('password'),
            'ep_afm' => '997177664',
            'type' => 1
        ]);
    }
}
