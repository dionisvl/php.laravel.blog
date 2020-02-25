<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $post_name = $faker->name;

    return [
        'name' => $post_name,
        'slug' => Str::slug($post_name),
        'topic_id' => $faker->numberBetween(1,5),
        'image' => $faker->imageUrl(100, 80,null, false,null,true),
        'preview_text' => $faker->realText(80),
        'full_text' => $faker->realText(),

        'views_count' => $faker->numberBetween(2,100),
        'state' => $faker->boolean(80),
    ];
});
