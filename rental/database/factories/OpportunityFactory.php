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
$factory->define(App\Models\Opportunity::class, function (Faker\Generator $faker) {
    $start = $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get());
    $days = $faker->numberBetween($min = 1, $max = 10);
    return [
        'transport_id' => App\Models\Transport::all()->random()->id,
        'user_id' => App\User::all()->random()->id,
        'start' => $start,
        'finish' => $faker->dateTimeInInterval($startDate = $start, $interval = '+ '.$days.' days', $timezone = date_default_timezone_get()),
    ];
});
