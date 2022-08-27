<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert (
            [
                'id' => '1',
                'name' => 'admin'
            ],
            [
                'id' => '2',
                'name' => 'manager'
            ],
            [
                'id' => '3',
                'name' => 'client'
            ]
        );
    }
}
