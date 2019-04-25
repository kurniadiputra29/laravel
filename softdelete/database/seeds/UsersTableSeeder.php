<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        		'name' => 'paijo',
        		'email' => 'paijo@gmail.com',
        		'password' => bcrypt('123'),
        	],
        	[
        		'name' => 'dodo',
        		'email' => 'dodo@gmail.com',
        		'password' => bcrypt('123'),
        	],
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
