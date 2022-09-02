<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeShoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 300; $i++) {
            DB::table('size_shoes')->insert(
                [
                    [
                        'size_id' => rand(1, 21),
                        'shoes_id' => rand(1, 120),
                    ],
                ]
            );
        }
    }
}
