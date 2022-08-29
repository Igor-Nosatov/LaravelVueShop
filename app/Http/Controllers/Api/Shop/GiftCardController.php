<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\GiftCard\GiftCardRequest;
use App\Repositories\Shop\GiftCard\GiftCardRepositoryInterface;

class GiftCardController extends BaseController
{
    /**
     * @var GiftCardRepositoryInterface
     */
    private GiftCardRepositoryInterface $giftCardRepository;

    /**
     * @param GiftCardRepositoryInterface $giftCardRepository
     */
    public function __construct(GiftCardRepositoryInterface $giftCardRepository)
    {
        $this->giftCardRepository = $giftCardRepository;
    }

    /**
     * @param GiftCardRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(GiftCardRequest $request)
    {
        $response = $this->reviewRepository->addReviewComment($request);
        return $this->createResponse($response, 'Gift Card Create');
    }
}
