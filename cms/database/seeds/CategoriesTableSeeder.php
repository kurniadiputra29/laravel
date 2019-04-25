<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create('id_ID');// id_ID untuk indonesia

    	for($i=0; $i<50; $i++){
    		$data[$i] = [
    			'name' => $faker->name
    		];
    	}

        DB::table('categories')->truncate();
        DB::table('categories')->insert($data);
    }
}
