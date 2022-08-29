<?php

namespace App\Repositories\Shop\Cart;

use App\Models\Shop\Favourite;
use App\Repositories\Shop\Account\AccountRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AccountRepository implements AccountRepositoryInterface
{
    /**
     * @return array
     */
    public function getAccountData(): array
    {
        $userData = Auth::user();
        $favouriteData = Favourite::where('user_id', Auth::id())->get()->toArray();
        $accountData = [
            'user_data' =>  $userData,
            'favourite_data' =>  $favouriteData,
        ];
        return $accountData; 
    }
}
