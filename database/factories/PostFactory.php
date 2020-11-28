<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
## \App\Post poderia ser desse jeito
$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'         => $faker->words(4,true),
        'description'   => $faker->sentence,
        'content'       => $faker->paragraphs(1,true),
        'slug'          => $faker->slug,
        'is_active'     => $faker->boolean,
        'user_id'       => rand(1,10)
    ];
});
