<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SamplerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('samplers')->insert(
            [
                ['name' => '237'],
                ['name' => '327'],
                ['name' => '550'],
                ['name' => '574'],
                ['name' => '860'],
                ['name' => '880'],
                ['name' => '990'],
                ['name' => '997'],
                ['name' => '1080'],
                ['name' => '2002'],
                ['name' => '57/40'],
            ]
        );
    }
}
