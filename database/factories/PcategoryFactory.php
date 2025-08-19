<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PCategory;
use Faker\Generator as Faker;
use \Illuminate\Support\Str;

$factory->define(PCategory::class, function (Faker $faker) {
    $catory_name = $this->faker->unique()->words($nb=2, $asText=true);
    $slug = Str::slug($catgeory_name);
    return [
        //
        'name'=> $catgeory_name,
        'slug' => $slug,
    ];
});
