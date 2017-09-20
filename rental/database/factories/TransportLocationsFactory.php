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
$factory->define(App\Models\TransportLocations::class, function (Faker\Generator $faker) {
    return [
        'transport_id' => function () {
            return factory(App\Models\Transport::class)->create()->id;
        },
        'created_at'=> $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
