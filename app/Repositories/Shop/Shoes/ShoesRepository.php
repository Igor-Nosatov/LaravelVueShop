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
            $categorySlug = $request->category;

            $query->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('category_id', $categorySlug);
            });
        }

        if ($request->filled('gender')) {
            $genderSlug = $request->gender;

            $query->whereHas('gender', function ($query) use ($genderSlug) {
                $query->where('gender_id', $genderSlug);
            });
        }

        if ($request->filled('type')) {
            $typeSlug = $request->type;

            $query->whereHas('type', function ($query) use ($typeSlug) {
                $query->where('type_id', $typeSlug);
            });
        }

        if ($request->filled('sampler')) {
            $samplerSlug = $request->sampler;

            $query->whereHas('sampler', function ($query) use ($samplerSlug) {
                $query->where('sampler_id', $samplerSlug);
            });
        }

        if ($request->filled('color')) {
            $colorSlug = $request->color;

            $query->whereHas('color', function ($query) use ($colorSlug) {
                $query->where('color_id', $colorSlug);
            });
        }

        if ($request->filled('sizes')) {
            $sizesSlug = $request->sizes;

            $query->whereHas('sizes', function ($query) use ($sizesSlug) {
                $query->where('size_id', $sizesSlug);
            });
        }

        if ($request->filled('width')) {
            $widthSlug = $request->width;

            $query->whereHas('width', function ($query) use ($widthSlug) {
                $query->where('width_id', $widthSlug);
            });
        }

        if ($request->filled('title')) {
            $title = $request->title;
            $query->where('title', 'LIKE', "%{$title}%")
                ->orWhere('description', 'LIKE', "%{$title}%");
        }

        $paginate = $query->with(['images', 'reviews',])->paginate(9)->toArray();
      

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
