<?php

namespace App\Repositories\Shop\Checkout;

use App\Http\Requests\Checkout\CheckoutRequest;
use App\Models\Shop\Checkout;
use App\Models\Shop\Shoes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CheckoutRepository implements CheckoutRepositoryInterface
{
    /**
     * @return array
     */
    public function getCheckoutData(): array
    {
        $checkoutData = Checkout::with(['cart'])
            ->where('user_id', Auth::id())
            ->get()->toArray();

        $shoesArrayData = [];
        foreach ($checkoutData as $value) {

            $shoesData = Shoes::with(['images', 'color', 'category'])->find($value['cart']['shoes_id']);
            $shoesArrayData[] = [
                'title' => $shoesData['title'],
                'price' => ($shoesData['price']) / 100,
                'category' => $shoesData['category']['name'],
                'type' => $shoesData['type']['name'],
                'color' => $shoesData['color']['name'],
                'image_url' => Storage::disk('public')->url('img/' .  $shoesData['images']['0']['name'] . '.webp')
            ];
        }

        $checkoutArrayData[] = [
            'user_name' =>  Auth::user()->name,
            'shipping' => 'free',
            'shoes_data' => $shoesArrayData,
            'order_total' => ($checkoutData['0']['cart']['quantity'] * Shoes::find($checkoutData['0']['cart']['shoes_id'])->price) / 100,
        ];

        return $checkoutArrayData;
    }

    /**
     * @param CheckoutRequest $request
     * @return mixed
     */
    public function addToCheckoutForm(CheckoutRequest $request): mixed
    {
        return  Checkout::create($request->all());
    }

    /**
     * @param Checkout $checkout
     * @return void
     */
    public function deleteFromCheckoutForm(Checkout $checkout): void
    {
        $checkout->delete();
    }
}
