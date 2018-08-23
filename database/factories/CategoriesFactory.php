<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $names = ['angular', 'Javascript', 'PHP', 'MySQL', 'HTML','Python', 'Big Data'];
    return [
        'name'=>$faker->randomElement($names)
    ];
});
