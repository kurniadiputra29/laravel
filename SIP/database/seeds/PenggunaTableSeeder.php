<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PenggunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
        	[
        		'nama' => 'adi',
        		'email' => 'adi@gmail.com',
        		'password' => bcrypt('123')
        	],
        	[
        		'nama' => 'dad',
        		'email' => 'dad@gmail.com',
        		'password' => bcrypt('123')
        	]
        ];
        DB::table('pengguna')->truncate();
        DB::table('pengguna')->insert($data);

    }
}
