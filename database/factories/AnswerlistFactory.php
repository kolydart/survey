<?php

$factory->define(App\Answerlist::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "type" => collect(["Radio","Radio + Text","Checkbox","Checkbox + Text","Text",])->random(),
    ];
});
