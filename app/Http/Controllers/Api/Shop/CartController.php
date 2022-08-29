<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\Shop\Cart\CartRepositoryInterface;
use App\Http\Requests\Cart\CartCreateRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Models\Shop\Cart;

class CartController extends BaseController
{
    /**
     * @var CartRepositoryInterface
     */
    private CartRepositoryInterface $cartRepository;

    /**
     * @param CartRepositoryInterface $cartRepository
     */
    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->cartRepository->getCartData();
        return $this->successResponse($response, 'Get Cart Data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartCreateRequest $request)
    {
        $response = $this->cartRepository->addToCart($request);
        return $this->createResponse($response, 'Add to Cart Data');
    }

    /**
     * @param CartUpdateRequest $request
     * @param Cart $cart
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CartUpdateRequest $request, Cart $cart)
    {
        $response = $this->cartRepository->addToCart($request, $cart );
        return $this->successResponse($response, 'Update to Cart Data');
    }

    /**
     * @param Cart $cart
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Cart $cart)
    {
        $this->cartRepository->deleteFromCart($cart);
        return $this->emptyResponse('Delete item from cart');
    }
}

