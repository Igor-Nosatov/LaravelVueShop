<?php

namespace Database\Factories\Shop;

use App\Models\Shop\Shoes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arrayValues = ['runs_small', 'true_size', 'runs_large'];
        return [
            'review_headline' => $this->faker->name(),
            'nickname' => $this->faker->name(),
            'comment' => $this->faker->text($maxNbChars = 200),
            'overall_fit' => $arrayValues[rand(0, 2)],
            'rating' => rand(1, 5),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'location' => $this->faker->streetAddress(),
            'email' => $this->faker->email(),
            'policy_agree' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'user_id' => NULL,
            'shoes_id' => Shoes::inRandomOrder()->take(1)->id,
        ];
    }
}
