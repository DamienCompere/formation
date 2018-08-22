<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(),
        'post_type'=>$faker->randomElement(['formation', 'stage', 'undetermined']),
        'description'=>$faker->paragraph(),
        'start_date'=>$faker->dateTime(),
        'end_date'=>$faker->dateTime(),
        'price'=>$faker->randomNumber(2),
        'nb_max'=>$faker->randomNumber(2)
    ];
});
