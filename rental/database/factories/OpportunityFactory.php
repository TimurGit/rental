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
    return [
        'transport_id' => function () {
            return factory(App\Models\Transport::class)->create()->id;
        },
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'start' => $start,
        'finish' => $faker->dateTimeBetween($startDate = $start, $endDate = 'now', $timezone = date_default_timezone_get()),
        'reg_number' => $faker->unique()->regexify('[A-Z][0-9][0-9][0-9][A-Z][A-Z]'),
    ];
});
