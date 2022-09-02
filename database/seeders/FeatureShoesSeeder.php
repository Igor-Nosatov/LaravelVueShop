<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureShoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 300; $i++) {
            DB::table('feature_shoes')->insert(
                [
                    [
                        'feature_id' => rand(1, 21),
                        'shoes_id' => rand(1, 120),
                    ],
                ]
            );
        }
    }
}
