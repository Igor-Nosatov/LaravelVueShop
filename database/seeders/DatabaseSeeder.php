<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FootWearSizeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(WidthSeeder::class);
        $this->call(SamplerSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(ShoesSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(FeatureShoesSeeder::class);
    }
}
