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
        User::create([
            'email' => 'test@test.test',
            'name' => 'test',
            'password' => Hash::make('password'),
            'ep_afm' => '997177664',
            'type' => 1
        ]);
    }
}
