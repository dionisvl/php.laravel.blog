<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Topic;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Topic::class, function (Faker $faker) {
    $topic_name = $faker->city;

    return [
        'name' => $topic_name,
        'slug' => Str::slug($topic_name),
        'state' => $faker->boolean(75)
    ];
});
