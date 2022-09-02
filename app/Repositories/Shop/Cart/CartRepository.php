<?php

namespace App\Repositories\Shop\Cart;


use App\Http\Requests\Cart\CartCreateRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Models\Shop\Cart;
use App\Models\Shop\Shoes;
use App\Repositories\Shop\Cart\CartRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartRepository implements CartRepositoryInterface
{
    /**
     * @return array
     */
    public function getCartData():array
    {
        $cartData = Cart::where('user_id', Auth::id())->get();

        $cartArray = [];
        $cartShoesData = [];
        $subTotal = [];

        foreach($cartData as $value)
        {
            $shoesData = Shoes::with(['images', 'color', 'category'])->find($value->shoes_id);
            $cartShoesData [] = [
                'title' => $shoesData['title'],
                'price' => ($shoesData['price']) / 100,
                'category' => $shoesData['category']['name'],
                'type' => $shoesData['type']['name'],
                'color' => $shoesData['color']['name'],
                'image_url' => Storage::disk('public')->url('img/' .  $shoesData['images']['0']['name'] . '.webp')
            ];
            $subTotal[] = $shoesData['price'];
        }

        $cartArray[] = [
            'shoes_data' => $cartShoesData,
            'sub_total' => (array_sum($subTotal)) / 100,
        ];

        return  $cartArray;
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
