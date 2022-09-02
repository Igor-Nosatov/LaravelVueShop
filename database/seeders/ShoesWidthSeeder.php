<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoesWidthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 300; $i++) {
            DB::table('shoes_width')->insert(
                [
                    [
                        'shoes_id' => rand(1, 120),
                        'width_id' => rand(1, 8),
                    ],
                ]
            );
        }
    }
}
