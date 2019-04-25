<?php

use Illuminate\Database\Seeder;
use App\Model\SantriModel;
class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
    	SantriModel::truncate();
        SantriModel::insert([
        	[
        	'nama' => 'Suryo',
        	'email' => 'surya@gmail.com',
        	'password' => bcrypt(123),
        	'gender' => 1
        	],
        	[
        	'nama' => 'Adi',
        	'email' => 'adi@gmail.com',
        	'password' => bcrypt(123),
        	'gender' => 1
        	],
        ]);
    }
}
