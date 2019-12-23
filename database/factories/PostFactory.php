<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
  return [
      'titre' => $faker->sentence(2, true),
      'contenu' => $faker->paragraph(),
      // 'user_id' => $faker->rand(1, 10),
  ];
});
