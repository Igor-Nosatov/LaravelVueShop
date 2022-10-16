<?php

namespace App\Repositories\Shop\Cart;


use App\Http\Requests\Cart\CartCreateRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Models\Shop\Cart;
use App\Models\Shop\Shoes;
use App\Models\Shop\Size;
use App\Models\Shop\Width;
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
            $sizeData = Size::find($value->size_id)->name;
            $widthData = Width::find($value->width_id)->name;

            $cartShoesData [] = [
                'cart_id' => $value->id,
                'id' => $shoesData['id'],
                'title' => $shoesData['title'],
                'price' => ($shoesData['price']) / 100,
                'category' => $shoesData['category']['name'],
                'type' => $shoesData['type']['name'],
                'color' => $shoesData['color']['name'],
                'image_url' => Storage::disk('public')->url('img/' .  $shoesData['images']['0']['name'] . '.webp'),
                'size' => $sizeData,
                'width' => $widthData,
                'shipped_days'=> $value->shipped_days
            ];
            $subTotal[] = $shoesData['price'];
        }

        $cartArray= [
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
     * @param Cart $cart
     * @return mixed
     */
    public function deleteFromCart(Cart $cart):void
    {
        $cart->delete();
    }

    public function getCartDataAccount():array 
    {
        $cartData = Cart::where('user_id', Auth::id())->get();

        $cartArrayData = [];
        foreach ($cartData as $value) {

            $shoesDataForCart = Shoes::with(['images', 'color', 'category'])->find($value['shoes_id']);
            $cartArrayData[] = [
                'id' => $shoesDataForCart['id'],
                'title' => $shoesDataForCart['title'],
                'price' => ($shoesDataForCart['price']) / 100,
                'category' => $shoesDataForCart['category']['name'],
                'type' => $shoesDataForCart['type']['name'],
                'color' => $shoesDataForCart['color']['name'],
                'image_url' => Storage::disk('public')->url('img/' .  $shoesDataForCart['images']['0']['name'] . '.webp')
            ];
        }

        return $cartArrayData; 
    }

    public function getCartCount()
    {
        $cartCount = [];
        $cartCount = [ 'total' => Cart::where('user_id', Auth::id())->count()];
        return  $cartCount; 
    }
}
