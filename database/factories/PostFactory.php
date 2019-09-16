<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    $user = App\User::inRandomOrder()->first();

    return [
        'title'       => $faker->realText(35),
        'description' => $faker->realText(500),
        'user_id'     => $user->id,
    ];
});
