<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
    //     // $this->call(UsersTableSeeder::class);
    //     // factory(App\Post::class, 10)->create();
    //     $this->call(UsersTableSeeder::class);
    //     $this->call(PostTableSeeder::class);
    // }


    public function run()
    {
        factory(App\User::class, 10)->create()->each(function ($user) {
            $i = rand(4, 6);
            while (--$i) {
                $user->posts()->save(factory(App\Post::class)->make());
            }
        });
    }
}
