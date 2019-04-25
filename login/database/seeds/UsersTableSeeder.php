<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'name' => 'ada',
        		'email' => 'ada@gmail.com',
        		'password' => bcrypt('123')
        	],
        	[
        		'name' => 'dada',
        		'email' => 'dada@gmail.com',
        		'password' => bcrypt('123')
        	],
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
