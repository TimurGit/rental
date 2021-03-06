<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Transport::class, function (Faker\Generator $faker) {
    return [
        'type_id' => $faker->numberBetween(1,3),
        'mark_id' => App\Models\Mark::all()->random()->id,
        'reg_number' => $faker->unique()->regexify('[A-Z][0-9][0-9][0-9][A-Z][A-Z][1]{0,1}[0-9][0-9]'),
    ];
});
