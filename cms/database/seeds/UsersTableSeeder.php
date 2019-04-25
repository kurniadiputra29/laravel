<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $data = [
    	// 	[
    	// 		'name' => 'abid',
    	// 		'email' => 'abid@abid',
    	// 		'password' => bcrypt('secret'),
    	// 		'created_at' => now(),
    	// 		'updated_at' => now(),
    	// 	],
    	// 	[
    	// 		'name' => 'usman',
    	// 		'email' => 'usman@usman',
    	// 		'password' => bcrypt('secret'),
    	// 		'created_at' => now(),
    	// 		'updated_at' => now(),
    	// 	],
    	// ];

    	$faker = Factory::create('id_ID');// id_ID untuk indonesia

    	for($i=0; $i<100; $i++){
    		$data[$i] = [
    			'name' => $faker->name,
    			'email' => $faker->freeEmail,
    			'password' => bcrypt('secret'),
    			'created_at' => now(),
     			'updated_at' => now(),
    		];
    	}

        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
