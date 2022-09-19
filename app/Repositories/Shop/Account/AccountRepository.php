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
        $accountData = [
            'user' =>  Auth::user()
        ];
        return  $accountData; 
    }
}
