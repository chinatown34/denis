<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Result;
use Faker\Generator as Faker;

$factory->define(Result::class, function (Faker $faker) {
    return [
        'person_id' => $faker->numberBetween(1, 10),
        'author_id' => $faker->numberBetween(1, 10),
        'description' => $faker->realText,
    ];
});


$factory->state(App\Result::class, 'moderated', function (Faker $faker) {
    return [
        'comment' => $faker->paragraph,
        'rating' => $faker->numberBetween(1, 5),
        'moderator_id' => $faker->numberBetween(1, 10),
        'moderated_at' => $faker->dateTimeThisMonth(),
    ];
});
