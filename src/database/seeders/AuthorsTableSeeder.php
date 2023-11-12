<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param =[
            'full-name' => 'Piro',
            'gender' => '1',
            'email' => 'piro@gmail.com',
            'postcode' => '1234567',
            'address' => '五反田',
            'building_name' => 'ファミーユ',
            'opinion' => 'よろしくな'
        ];
        DB::table('authors')->insert($param);
        $param = [
            'full-name' => 'Tadi',
            'gender' => '1',
            'email' => 'Tadi@gmail.com',
            'postcode' => '1234567',
            'address' => '大崎',
            'building_name' => '坂の上',
            'opinion' => 'いえい'
        ];
        DB::table('authors')->insert($param);
    }
}
