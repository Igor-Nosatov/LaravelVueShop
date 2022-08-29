<?php

namespace App\Repositories\Shop\GiftCard;

use App\Http\Requests\GiftCard\GiftCardRequest;
use App\Models\Shop\GiftCard;
use App\Repositories\Shop\GiftCard\GiftCardRepositoryInterface;

class GiftCardRepository implements GiftCardRepositoryInterface
{
    /**
     * @param GiftCardRequest $request
     * @return mixed
     */
    public function createGiftCard(GiftCardRequest $request ):mixed
    {
        return GiftCard::create($request->all($request));
    }
}