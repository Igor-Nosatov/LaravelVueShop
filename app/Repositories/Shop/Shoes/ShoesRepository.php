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
    public function getShoesData(Request $request, int $paginationParam = 9)
    {
        $query = Shoes::query();

        if ($request->filled('category')) {
            $query->categoryFilter($request->category);
        }
        if ($request->filled('gender')) {
           $query->genderFilter($request->gender);
        }
        if ($request->filled('type')) {
            $query->typeFilter($request->type);
        }
        if ($request->filled('sampler')) {
            $query->samplerFilter($request->sampler);
        }
        if ($request->filled('color')) {
            $query->colorFilter($request->color);
        }
        if ($request->filled('size')) {
            $query->sizeFilter($request->size);
        }
        if ($request->filled('width')) {
            $query->widthFilter($request->width);
        }
        if ($request->filled('title')) {
            $query->search($request->title);
        }

        $paginate = $query->with([
            'images',
            'reviews',
            'category',
            'type',
            'gender',
            'sampler',
            'color',
            'size',
            'width',
        ])->paginate($paginationParam)->toArray();


          //lists of array for shop data
            $ratingData = [];
            $sizeData = [];
            $widthData = [];
            $shoesData = [];
            $categoryData = [];
            $typeData = [];
            $genderData = [];
            $samplerData = [];
            $colorData = [];

        foreach ($paginate['data'] as $value) {
            foreach ($value['reviews'] as $ratingValue) {
                $ratingData[] = $ratingValue['rating'];
                $averageRating = (array_sum($ratingData)) / (count($ratingData));
            }
          
            foreach ($value['size'] as $sizesValue) {
                $sizeData[] = [
                    'id' =>  $sizesValue['id'],
                    'name' =>  $sizesValue['name']
                ];
            }
           
            foreach ($value['width'] as $widthValue) {
                $widthData[] = [
                    'id' =>  $widthValue['id'],
                    'name' =>  $widthValue['name']
                ];
            }

            //format shoes data
            $shoesData[] = [
                'title' => $value['title'],
                'price' => $value['price'],
                'style_code' => $value['style_code'],
                'image_url' => Storage::disk('public')->url('img/' .  $value['images']['0']['name'] . '.webp'),
                'average_rating' =>  $averageRating,
                'category' =>  $categoryData = [
                    'id' => $value['category']['id'],
                    'name' => $value['category']['name'],
                ],
                'type' =>  $typeData = [
                    'id' => $value['type']['id'],
                    'name' => $value['type']['name'],
                ],
                'gender' =>  $genderData = [
                    'id' => $value['gender']['id'],
                    'name' => $value['gender']['name'],
                ],
                'sampler' =>  $samplerData = [
                    'id' => $value['sampler']['id'],
                    'name' =>  $value['sampler']['name'],
                ],
                'color' =>    $colorData = [
                    'id' => $value['color']['id'],
                    'name' => $value['color']['name'],
                ],
                'size' => $sizeData,
                'width' => $widthData,
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

    /**
     * @param Shoes $shoes
     * @return array
     */
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
