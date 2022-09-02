<?php

namespace App\Repositories\Shop\Checkout;

use App\Http\Requests\Checkout\CheckoutRequest;
use App\Models\Shop\Checkout;
use Illuminate\Http\Request;

interface CheckoutRepositoryInterface
{
    /**
     * @return array
     */
    public function getCheckoutData():array;

    /**
     * @param CheckoutRequest $request
     * @return mixed
     */
    public function addToCheckoutForm(CheckoutRequest $request): mixed;

    /**
     * @param Checkout $checkout
     * @return void
     */
    public function deleteFromCheckoutForm(Checkout $checkout):void;
}
