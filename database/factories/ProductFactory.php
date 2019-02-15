<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 499),
        'size' => $faker->randomElement($array = array ('36', '38', '40', '42', '44', '46', '48', '50', '52')),
        'url_image' => $faker->imageUrl($width = 400, $height = 400),
        'status' => $faker->randomElement($array = array ('Publié', 'Brouillon')),
        'code' => $faker->randomElement($array = array ('solde', 'new')),
        'reference' => $faker->randomNumber($nbDigits = 6, $strict = false)
    ];
});
