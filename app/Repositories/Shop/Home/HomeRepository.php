<?php

namespace App\Repositories\Shop\Home;

use App\Models\Shop\Gender;
use App\Models\Shop\Shoes;
use App\Repositories\Shop\Home\HomeRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class  HomeRepository implements HomeRepositoryInterface
{
    /**
     * @return array[]
     */
    public function getShoesDataForHomePage():array
    {
        $itemsMensShoesData = Shoes::with(['images','gender'])->where('gender_id',1)->take(4)->get();
        foreach ($itemsMensShoesData as $value) {
           $mensShoesData[] = [
                'title' => $value['title'],
                'price' => $value['price'],
                'gender' => $value['gender']['name'],
                'image_url' =>  Storage::disk('public')->url('img/' .  $value['images']['0']['name'].'.webp')
            ];
        }

        $itemsWomensShoesData = Shoes::with(['images','gender'])->where('gender_id',2)->take(4)->get();
        foreach ($itemsWomensShoesData as $value) {
            $womenShoesData[] = [
                'title' => $value['title'],
                'price' => $value['price'],
                'gender' => $value['gender']['name'],
                'image_url' =>  Storage::disk('public')->url('img/' .  $value['images']['0']['name'].'.webp')
            ];
        }


        $itemsKidsShoesData = Shoes::with(['images','gender'])->where('gender_id',3)->take(4)->get();
        foreach ($itemsKidsShoesData as $value) {
            $kidsShoesData[] = [
                'title' => $value['title'],
                'price' => $value['price'],
                'gender' => $value['gender']['name'],
                'image_url' =>  Storage::disk('public')->url('img/' .  $value['images']['0']['name'].'.webp')
            ];
        }

        $categoryData = Gender::get();
        foreach ( $categoryData as $value) {
            $categoryShoesData[] = [
                'name' => $value['name'],
                'image_url' =>  Storage::disk('public')->url('img/' .  $value['image'].'.webp')
            ];
        }

        $productData = [
          'men_shoes' => $mensShoesData,
          'women_shoes' => $womenShoesData,
          'kid_shoes' => $kidsShoesData,
          'gender' => $categoryShoesData
        ];

        return $productData;
    }
}


