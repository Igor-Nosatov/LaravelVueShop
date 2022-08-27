<?php

namespace Database\Seeders;

use App\Models\Shop\Shoes;
use Illuminate\Database\Seeder;

class ShoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shoes::factory()->count(120)->create();
    }
}
