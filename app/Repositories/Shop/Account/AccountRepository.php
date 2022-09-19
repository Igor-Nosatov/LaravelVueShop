<?php

namespace App\Repositories\Shop\Account;

use App\Models\Shop\Cart;
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
        $cartData = Cart::where('user_id', Auth::id())->get();

        $favouriteArrayData = [];
        foreach ($favouriteData as $value) {

            $shoesData = Shoes::with(['images', 'color', 'category'])->find($value['shoes_id']);
            $favouriteArrayData[] = [
                'title' => $shoesData['title'],
                'price' => ($shoesData['price']) / 100,
                'category' => $shoesData['category']['name'],
                'type' => $shoesData['type']['name'],
                'color' => $shoesData['color']['name'],
                'image_url' => Storage::disk('public')->url('img/' .  $shoesData['images']['0']['name'] . '.webp')
            ];
        }

        $cartArrayData = [];
        foreach ($cartData as $value) {

            $shoesDataForCart = Shoes::with(['images', 'color', 'category'])->find($value['shoes_id']);
            $cartArrayData[] = [
                'title' => $shoesDataForCart['title'],
                'price' => ($shoesDataForCart['price']) / 100,
                'category' => $shoesDataForCart['category']['name'],
                'type' => $shoesDataForCart['type']['name'],
                'color' => $shoesDataForCart['color']['name'],
                'image_url' => Storage::disk('public')->url('img/' .  $shoesDataForCart['images']['0']['name'] . '.webp')
            ];
        }


        $accountData = [
            'user' =>  $userData,
            'favourites' =>  $favouriteArrayData,
            'cart' =>   $cartArrayData,
        ];
        return $accountData; 
    }
}
