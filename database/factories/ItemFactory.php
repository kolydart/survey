<?php

$factory->define(App\Item::class, function (Faker\Generator $faker) {
    return [
        "survey_id" => factory('App\Survey')->create(),
        "question_id" => factory('App\Question')->create(),
        "order" => $faker->name,
    ];
});