<?php

namespace App\Repositories\Shop\Cart;

use App\Models\Shop\Cart;
use Illuminate\Http\Request;
use App\Repositories\Shop\Cart\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface
{
    public function addToCart()
    {
        $cart = Cart::create($request->all());
        return $cart;
    }

    public function updateToCart()
    {
    }
    public function deleteFromCart()
    {
    }
}
