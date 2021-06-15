<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author_id' => $faker->numberBetween(1,10),
        'author' => $faker->text(7),
        'post_title' => $faker->text(40),
        'post_text' => $faker->text(1000),
        'img' => $faker->imageUrl(750,300)
    ];
});
