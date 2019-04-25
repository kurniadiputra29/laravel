<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ArticlesTableSeeder extends Seeder
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
        		'user_id' => '1',
        		'title' => 'judul',
        		'content' => 'aku moh',
        	],
        	[
        		'user_id' => '2',
        		'title' => 'KAU',
        		'content' => 'IHIK moh',
        	],
        ];
        DB::table('articles')->truncate();
        DB::table('articles')->insert($data);
    }
}
