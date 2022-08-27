<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 120; $i++) {
            $faker = \Faker\Factory::create();
            $arrayValues = ['runs_small', 'true_size', 'runs_large'];
            DB::table('reviews')->insert(
                [
                    [
                        'review_headline' =>$faker->name(),
                        'nickname' =>$faker->name(),
                        'comment' =>$faker->name(),
                        'overall_fit' => $arrayValues[rand(0, 2)],
                        'rating' => 4,
                        'image' =>$faker->imageUrl($width = 640, $height = 480),
                        'location' =>$faker->streetAddress(),
                        'email' =>$faker->email(),
                        'policy_agree' =>$faker->boolean($chanceOfGettingTrue = 50),
                        'user_id' => NULL,
                        'shoes_id' => $i,
                    ],
                ]
            );
        }
    }
}
