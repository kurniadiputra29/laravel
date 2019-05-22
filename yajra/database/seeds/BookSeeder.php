<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
            'title'			=> '7 Keajaiban Rezeki',
			'author'		=> 'Ippho Santosa',
			'publisher'		=> 'Elex Media Komputindo',
        ];
		DB::table('books')->truncate();
        DB::table('books')->insert($data);
    }
}


