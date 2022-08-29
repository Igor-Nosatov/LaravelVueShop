<?php

namespace App\Repositories\Shop\Cart;
use App\Http\Requests\Cart\CartCreateRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Models\Shop\Cart;

interface CartRepositoryInterface
{
    public function addToCart(CartCreateRequest $request);
    public function updateToCart(CartUpdateRequest $request, Cart $cart);
    public function deleteFromCart(int $id);
}
