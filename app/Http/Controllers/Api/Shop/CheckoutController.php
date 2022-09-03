<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CheckoutRequest;
use App\Models\Shop\Checkout;
use App\Repositories\Shop\Checkout\CheckoutRepositoryInterface;

class CheckoutController extends BaseController
{
    /**
     * @var CheckoutRepositoryInterface
     */
    private CheckoutRepositoryInterface $checkoutRepository;

    /**
     * @param CheckoutRepositoryInterface $checkoutRepository
     */
    public function __construct(CheckoutRepositoryInterface $checkoutRepository)
    {
        $this->checkoutRepository = $checkoutRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->checkoutRepository->getCheckoutData();
        return $response; //$this->successResponse($response, 'Get Checkout Data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        $response = $this->checkoutRepository->addToCheckoutForm($request);
        return $this->createResponse($response->toArray(), 'Add item to Checkout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        $this->checkoutRepository->deleteFromCheckoutForm($checkout);
        return $this->emptyResponse('Delete item from Checkout');
    }
}


