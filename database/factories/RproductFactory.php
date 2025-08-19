<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RProduct;
use Faker\Generator as Faker;
use \Illuminate\Support\Str;

$factory->define(RProduct::class, function (Faker $faker) {
    $product_name = $this->faker->unique()->words($nb=2, $asText=true);
    $slug = Str::slug($product_name);
    return [
        //
        'name'=> $product_name,
        'slug' => $slug,
        'short_description'=> $this->faker->text(200),
        'regular_price'=> $this->faker->numberBetween(10, 500),
        'SKU'=> $this->faker->unique()->numberBetween(100, 500),
        'stock_status'=> 'instock',
        'quantity'=> $this->faker->numberBetween(100, 200),
        'image'=> 'digital_'.$this->faker->numberBetween(100, 200).'.jpg',
        'category_id'=> $this->faker->numberBetween(1, 5),
    ];
});
