<?php

namespace App\Repositories\Shop\Cart;
use App\Http\Requests\Cart\CartCreateRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Models\Shop\Cart;

interface CartRepositoryInterface
{
    public function getCartData():array;
    /**
     * @param CartCreateRequest $request
     * @return mixed
     */
    public function addToCart(CartCreateRequest $request);
    /**
     * @param Cart $cart
     * @return mixed
     */
    public function deleteFromCart(Cart $cart):void;
    public function getCartDataAccount():array;
    public function getCartCount();
}
