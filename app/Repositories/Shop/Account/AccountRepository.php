<?php

namespace App\Repositories\Shop\Account;

use App\Models\Shop\Favourite;
use App\Models\Shop\Shoes;
use App\Repositories\Shop\Account\AccountRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountRepository implements AccountRepositoryInterface
{
    /**
     * @return array
     */
    public function getAccountData(): array
    {
        $userData = Auth::user();
        $favouriteData = Favourite::where('user_id', Auth::id())->get();

        $shoesArrayData = [];
        foreach ($favouriteData as $value) {

            $shoesData = Shoes::with(['images', 'color', 'category'])->find($value['shoes_id']);
            $shoesArrayData[] = [
                'title' => $shoesData['title'],
                'price' => ($shoesData['price']) / 100,
                'category' => $shoesData['category']['name'],
                'type' => $shoesData['type']['name'],
                'color' => $shoesData['color']['name'],
                'image_url' => Storage::disk('public')->url('img/' .  $shoesData['images']['0']['name'] . '.webp')
            ];
        }

        $accountData = [
            'user_data' =>  $userData,
            'favourite_data' =>  $shoesArrayData,
        ];
        return $accountData; 
    }
}
