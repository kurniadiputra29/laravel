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
            'name'          => 'KAP',
            'email'         => 'kap@gmail.com',
            'password'      => bcrypt('12345'),
            'foto'         => 'public/foto/QgJZkIuj8GF1YjrCr6EGfJHYNlVuKMGzfwgdDSvg.jpeg',
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
        DB::table('users')->truncate();
        DB::table('users')->insert($data);
    }
}
