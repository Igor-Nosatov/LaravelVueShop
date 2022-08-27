<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert(
            [
                [
                    'name' => 'Men',
                    'image' => 'mencategory',

                ],
                [
                    'name' => 'Women',
                    'image' => 'womencategory',
                ],
                [
                    'name' => 'Kids',
                    'image' => 'kidscategory',
                ],
            ]
        );
    }
}
