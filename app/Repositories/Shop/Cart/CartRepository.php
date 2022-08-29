<?php

namespace App\Repositories\Shop\Cart;


use App\Http\Requests\Cart\CartCreateRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Models\Shop\Cart;
use App\Repositories\Shop\Cart\CartRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CartRepository implements CartRepositoryInterface
{
    /**
     * @return array
     */
    public function getCartData():array
    {
       return  Cart::where('user_id', Auth:id())->get()->toArray();
    }
    /**
     * @param CartCreateRequest $request
     * @return mixed
     */
    public function addToCart(CartCreateRequest $request)
    {
        return Cart::create($request->all());
    }

    /**
     * @param CartUpdateRequest $request
     * @param Cart $cart
     * @return Cart
     */
    public function updateToCart(CartUpdateRequest $request, Cart $cart): Cart
    {
        $cart->update($request->all());
        return $cart;
    }

    /**
     * @param Cart $cart
     * @return mixed
     */
    public function deleteFromCart(Cart $cart):void
    {
        $cart->delete();
    }
}
