<?php

namespace App\Repositories\Shop\Cart;


use App\Http\Requests\Cart\CartCreateRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Models\Shop\Cart;
use App\Repositories\Shop\Cart\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface
{
    public function addToCart(CartCreateRequest $request)
    {
        $cart = Cart::create($request->all());
        return $cart;
    }

    public function updateToCart(CartUpdateRequest $request, Cart $cart)
    {
        $cart->update($request->all());
        return $cart;
    }
    public function deleteFromCart(int $id)
    {
    }
}
