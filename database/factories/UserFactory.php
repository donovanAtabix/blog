<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'                => $faker->name,
        'email'               => $faker->unique()->safeEmail,
        'email_verified_at'   => now(),
        'password'            => 'secret',
        'avatar_name'         => $faker->name,
        'switch_display_name' => '0',
    ];
});
