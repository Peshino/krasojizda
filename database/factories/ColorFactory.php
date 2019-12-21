<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Color;
use Faker\Generator as Faker;

$factory->define(Color::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'hex_code' => $faker->hexColor,
        'rgb_code' => $faker->rgbColor,
    ];
});
