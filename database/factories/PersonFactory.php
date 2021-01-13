<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'gender' => $faker->boolean(),
        'photo_path' => $faker->numberBetween(1, 18) . '.jpg',
        'description' => $faker->realText(),
        'description_expert' => $faker->optional()->realText(),
        'author_id' => $faker->numberBetween(6, 10),
        'moderator_id' => $faker->optional()->numberBetween(2, 5),
        'bad_photos_flag' => $faker->boolean(),
        'moderated_flag' => $faker->boolean(),
        'created_at' => $faker->dateTimeThisMonth(),
    ];
});
