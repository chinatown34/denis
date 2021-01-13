<?php

use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::truncate();
        $this->call(DatabaseSeeder::class);

        factory(App\User::class, 4)->create(['role' => 'moderator']);
        factory(App\User::class, 5)->create(['role' => 'user']);
        factory(App\User::class, 20)->create();

        App\Person::truncate();
        App\Photo::truncate();
        factory(App\Person::class, 10)->create()->each(function ($person) {
                $person->photos()->saveMany(factory(App\Photo::class, 3)->make());
        });

        App\Result::truncate();
        factory(App\Result::class, 10)->create();
        factory(App\Result::class, 10)->state('moderated')->create();
    }
}
