<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) use ($factory) {
    return [
        'post_id' => $factory->create(Post::class)->id,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->domainName,
        'comment'=> $faker->sentence,
    ];
});
