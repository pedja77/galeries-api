<?php

use Faker\Generator as Faker;

$factory->define(App\GalleryItem::class, function (Faker $faker) {
    return [
        'image_link'=> $faker->imageUrl(),
        'item_order' => $faker->numberBetween(1, 12)
    ];
});
