<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert(
            [
                ['name' => 'black'],
                ['name' => 'green'],
                ['name' => 'white'],
                ['name' => 'red'],
                ['name' => 'blue'],
                ['name' => 'brown'],
                ['name' => 'gray'],
                ['name' => 'yellow'],
                ['name' => 'orange'],
                ['name' => 'purple'],
                ['name' => 'pink'],
                ['name' => 'tan'],
            ]
        );
    }
}
