<?php

namespace App\Repositories\Shop\Option;

use App\Models\Shop\Category;
use App\Models\Shop\Color;
use App\Models\Shop\FootWearSize;
use App\Models\Shop\Sampler;
use App\Models\Shop\Type;
use App\Models\Shop\Width;
use App\Repositories\Shop\Option\OptionRepositoryInterface;

class OptionRepository implements OptionRepositoryInterface
{
    public function getOptions()
    {
        $categories = Category::get()->toArray();
        $colors = Color::get()->toArray();
        $support_types = Type::get()->toArray();
        $models = Sampler::get()->toArray();
        $width = Width::get()->toArray();
        $footWearSizes = FootWearSize::get()->toArray();

        $optionsData = [
            'categories' => $categories,
            'colors' => $colors,
            'support_types' => $support_types,
            'models' => $models,
            'width' => $width,
            'foot_wear_sizes'=> $footWearSizes
        ];

        return $optionsData;
    }
}
