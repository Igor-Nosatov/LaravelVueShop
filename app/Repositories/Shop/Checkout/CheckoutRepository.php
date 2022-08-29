<?php

namespace App\Repositories\Shop\Checkout;

use App\Http\Requests\Checkout\CheckoutRequest;
use App\Models\Shop\Checkout;
use Illuminate\Http\Request;

class CheckoutRepository implements CheckoutRepositoryInterface
{
    public function getCheckoutData():array
    {
      return Checkout::where()->get()->toArray();
    }
    public function addToCheckoutForm(CheckoutRequest $request)
    {
        return  Checkout::create($request->all());
    }
    public function deleteFromCheckoutForm(Checkout $checkout):void
    {
        $checkout->delete();
    }
}