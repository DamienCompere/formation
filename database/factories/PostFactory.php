<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {

    return [
        'title'=>$faker->sentence(),
        'post_type'=>$faker->randomElement(['formation', 'stage', 'undetermined']),
        'status'=>$faker->randomElement(['published', 'unpublished']),
        'description'=>$faker->paragraph(),
        'start_date'=>$faker->dateTimeBetween('now', '+ 2 months'),
        'end_date'=>$faker->dateTimeBetween('+ 2 months', '+ 5 months'),
        'price'=>$faker->randomNumber(2),   
        'nb_max'=>$faker->randomNumber(2)
    ];
});
