<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\ProductAttribute;
use App\Model;
use Faker\Generator as Faker;

$factory->define(ProductAttribute::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->sentence(5),
    ];
});
