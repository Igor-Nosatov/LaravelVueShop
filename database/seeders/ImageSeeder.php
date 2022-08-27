<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 120; $i++) {
            DB::table('images')->insert(
                [
                    [
                        'name' => 'pr1',
                        'shoes_id' => $i
                    ],
                    [
                        'name' => 'pr2',
                        'shoes_id' => $i
                    ],
                    [
                        'name' => 'pr3',
                        'shoes_id' => $i
                    ],
                    [
                        'name' => 'pr4',
                        'shoes_id' => $i
                    ],
                    [
                        'name' => 'pr5',
                        'shoes_id' => $i
                    ],
                    [
                        'name' => 'pr6',
                        'shoes_id' => $i
                    ],
                ]
            );
        }
    }
}
