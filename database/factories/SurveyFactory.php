<?php

$factory->define(App\Survey::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "alias" => $faker->word,
        "institution_id" => factory('App\Institution')->create(),
        "introduction" => $faker->name,
        "javascript" => $faker->name,
        "notes" => $faker->name,
        "inform" => 0,
        "access" => collect(["public","invited","registered",])->random(),
        "completed" => 0,
    ];
});
