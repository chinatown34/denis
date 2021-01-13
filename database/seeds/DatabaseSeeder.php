<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        \App\User::create(['name' => 'admin', 'role' => 'admin', 'email' => 'admin@example.com', 'password' => \Hash::make('password')]);
        // \App\User::create(['name' => 'admin', 'email' => 'admin@example.com', 'password' => 'password']);
    }
}
