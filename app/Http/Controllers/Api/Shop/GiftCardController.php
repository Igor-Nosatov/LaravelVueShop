<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\GiftCard\GiftCardRequest;
use App\Models\Shop\GiftCard;
use App\Repositories\Shop\GiftCard\GiftCardRepositoryInterface;
use Illuminate\Http\Request;

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
     */
    public function store(GiftCardRequest $request)
    {
        $response = $this->giftCardRepository->createGiftCard($request);
        return $this->createResponse($response, 'Gift Card Create');
    }
}
