<?php

namespace App\Repositories\Shop\Shoes;

use Illuminate\Http\Request;
use App\Repositories\Shop\Shoes\ShoesRepositoryInterface;
use App\Models\Shop\Shoes;
use Illuminate\Support\Facades\Storage;

class ShoesRepository implements ShoesRepositoryInterface
{
    /**
     * @return array
     */
    public function getShoesData(): array
    {
        $paginate = Shoes::with(['images', 'reviews'])->paginate(12)->toArray();

        foreach ($paginate['data'] as $value) {
            //average rating
            $ratingData = [];
            foreach ($value['reviews'] as $ratingValue) {
                $ratingData[] = $ratingValue['rating'];
                $averageRating = (array_sum($ratingData)) / (count($ratingData));
            }
            //format shoes data
            $shoesData[] = [
                'title' => $value['title'],
                'price' => $value['price'],
                'style_code' => $value['style_code'],
                'image_url' => Storage::disk('public')->url('img/' .  $value['images']['0']['name'] . '.webp'),
                'average_rating' =>  $averageRating
            ];
        }

        return [
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
    }

    public function getShoesSingleData(Shoes $shoes)
    {
        $shoesDataById = $shoes->with([
            'category',
            'type',
            'gender',
            'sampler',
            'images',
            'color',
            'features',
            'sizes',
            'width',
            'reviews'
        ])->find($shoes['id']);

        $imageArray = [];
        $reviewArray = [];
        $featuresArray = [];
        $sizesArray = [];
        $widthArray = [];


        foreach ($shoesDataById['images'] as $value) {
            $imageArray[] = [
                'image_url' =>  Storage::disk('public')->url('img/' .  $value->name . '.webp')
            ];
        }

        foreach ($shoesDataById['reviews'] as $value) {
            $reviewArray[] = $value;
        }

        $shoesArrayById = [
            'id' => $shoesDataById['id'],
            'title' => $shoesDataById['title'],
            'style_code' => $shoesDataById['style_code'],
            'price' =>  $shoesDataById['price'],
            'description' => $shoesDataById['description'],
            'category' => $shoesDataById['category']['name'],
            'gender' =>  $shoesDataById['gender']['name'],
            'type' =>  $shoesDataById['type']['name'],
            'sampler' =>  $shoesDataById['sampler']['name'],
            'color' =>  $shoesDataById['color']['name'],
            'images' =>  $imageArray,
            'reviews' => $reviewArray,
            'features' =>  $featuresArray,
            'sizes' =>  $sizesArray,
            'width' => $widthArray,
        ];
        return $shoesArrayById;
    }
}
