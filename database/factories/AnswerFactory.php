<?php

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
    ];
});