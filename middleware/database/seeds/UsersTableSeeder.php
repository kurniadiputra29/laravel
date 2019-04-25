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
        		'name' => 'John Doe',
        		'email' => 'john@doe.com',
        		'password' => bcrypt('test')
        	],
        	[
        		'name' => 'Jone Doe',
        		'email' => 'jone@doe.com',
        		'password' => bcrypt('test')
        	],
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
