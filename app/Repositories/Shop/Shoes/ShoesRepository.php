<?php

namespace App\Repositories\Shop\Shoes;

use Illuminate\Http\Request;
use App\Repositories\Shop\Shoes\ShoesRepositoryInterface;
use App\Models\Shop\Shoes;
use Illuminate\Support\Facades\Storage;

class ShoesRepository implements ShoesRepositoryInterface
{
    public function getShoesData()
    {
        $paginate = Shoes::with(['images', 'reviews'])->paginate(12)->toArray();

        foreach ($paginate['data'] as $value) {

            $shoesData[] = [
                'title' => $value['title'],
                'price' => $value['price'],
                'style_code' => $value['style_code'],
                'image_url' => Storage::disk('public')->url('img/' .  $value['images']['0']['name'] . '.webp'),
                'average_rating' =>  $value['reviews']
            ];
        }

        $response = [
            'meta' => [
                'total' => $paginate['total'],
                'per_page' => $paginate['per_page'],
                'current_page' => $paginate['current_page'],
                'first_page_url' => $paginate['first_page_url'],
                'last_page_url' => $paginate['last_page_url'],
                'next_page_url' => $paginate['next_page_url'],
            ],
            'data' => $shoesData
        ];

        return $response;
    }
}
