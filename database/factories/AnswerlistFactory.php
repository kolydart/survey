<?php

$factory->define(App\Answerlist::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->sentence,
        "type" => collect(["radio","checkbox","text","number","range","color","date","time","datetime","email","url",])->random(),
    ];
});
