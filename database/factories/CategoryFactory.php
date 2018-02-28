<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [

    	// para poner mayuscula ala primera letra
        'name' => ucfirst($faker->word),
        'description' => $faker->sentence(5)
    ];
});
