<?php

namespace App\Repositories\Shop\Checkout;

use App\Http\Requests\Checkout\CheckoutRequest;
use App\Models\Shop\Checkout;
use Illuminate\Http\Request;

interface CheckoutRepositoryInterface
{
    public function getCheckoutData():array;
    public function addToCheckoutForm(CheckoutRequest $request);
    public function deleteFromCheckoutForm(Checkout $checkout):void;
}
