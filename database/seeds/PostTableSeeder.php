<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostTableSeeder extends Seeder {

    private function randDate()
  	{
  		  return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
  	}

  	public function run()
  	{
    		DB::table('posts')->delete();

        // Création de 100 articles
    		for($i = 0; $i < 20; ++$i)
    		{
      			$date = $this->randDate();
      			DB::table('posts')->insert([
      				'titre' => 'Titre' . $i,
      				'contenu' => $ret,
              'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
      				'user_id' => rand(2, 6),
              // 'user_id' => $this->random('User')->id
      				'created_at' => $date,
      				'updated_at' => $date
      			]);
    		}
  	}


    public function getFakeData(Generator $faker)
     {
         $paragraphs = rand(1, 5);
         $nb = 0;
         $ret = "";
         while ($nb < $paragraphs) {
             $ret .= "<p>" . $faker->paragraph(rand(2, 6)) . "</p>";
             $nb++;
         }
         return $ret;
     }

}
