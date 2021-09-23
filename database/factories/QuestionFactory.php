<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        #---- el ".": elimina el punto q se le da a la frase creada.
        'title' => rtrim($faker->sentence(random_int(5, 10)), "."),
        #---- el 3, significa el 3 saltos de linea
        'body' => $faker->paragraphs(random_int(3, 7), true),
        'views' => random_int(0, 10),
        'answers' => random_int(0, 10),
        'votes' => random_int(-3, 10)
    ];
});
