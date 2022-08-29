<?php

namespace App\Repositories\Shop\Checkout;

use App\Http\Requests\Checkout\CheckoutRequest;
use App\Models\Shop\Checkout;
use Illuminate\Http\Request;

class CheckoutRepository implements CheckoutRepositoryInterface
{
    /**
     * @return array
     */
    public function getCheckoutData():array
    {
      return Checkout::where()->get()->toArray();
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
    public function deleteFromCheckoutForm(Checkout $checkout):void
    {
        $checkout->delete();
    }
}