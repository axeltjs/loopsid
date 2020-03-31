<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) use ($factory) {
    $title = $faker->sentence;
    $slug = Str::slug($title, '-');

    return [
        'user_id' => $factory->create(User::class)->id,
        'title' => $faker->sentence,
        'slug' => $slug,
        'content' => $faker->paragraph,
        'image' => null
    ];
});
