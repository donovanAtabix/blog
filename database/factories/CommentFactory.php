<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

    $user = App\User::inRandomOrder()->first();
    $post = App\Post::inRandomOrder()->first();

    return [
        'user_id'     => $user->id,
        'post_id'     => $post->id,
        'description' => $faker->realText(200),
    ];
});
