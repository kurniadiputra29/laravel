<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $user_id = DB::table('users')->pluck('id');
        $category_id = DB::table('categories')->pluck('id');

        for($i=0; $i<10;$i++){
        	$data[$i] =[
                'user_id' => $faker->randomElement($user_id),// rendem untuk mengacak
        		'category_id' => $faker->randomElement($category_id),// rendem untuk mengacak
        		'title' => $faker->sentence(3),
        		'content' => $faker->paragraphs(3, true),
        	];
        }
        DB::table('articles')->truncate();
        DB::table('articles')->insert($data);
    }
}
