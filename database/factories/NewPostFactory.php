<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NewPost;
use Faker\Generator as Faker;

$factory->define(NewPost::class, function (Faker $faker) {
    return [
        'img' => $faker->imageUrl(750,300),
        'post_title' => $faker->text(50),
        'post_text' => $faker->text(1000),
        'author_id' => $faker->numberBetween(1,10)
    ];
});
