<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
  return [
      'titre' => $faker->sentence(2, true),
      // 'contenu' => $faker->paragraph(),
      'contenu' => $faker->paragraph(rand(2, 6)),
      'excerpt' => $faker->paragraph(1),
      // 'user_id' => $faker->randomNumber,
  ];
});
