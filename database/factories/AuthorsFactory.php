<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Authors;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;



$factory->define(Authors::class, function (Faker $faker) {

    $year = rand(2018, 2021);
    $month = rand(1, 12);
    $day = rand(1, 28);

    $date = Carbon::create($year,$month ,$day , 0, 0, 0);

    return [
        "nama" => $faker->name,
        "created_at" => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s')

    ];
});
