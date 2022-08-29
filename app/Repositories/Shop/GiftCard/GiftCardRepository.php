<?php

namespace App\Repositories\Shop\GiftCard;

use App\Http\Requests\GiftCard\GiftCardRequest;
use App\Models\Shop\GiftCard;
use App\Repositories\Shop\GiftCard\GiftCardRepositoryInterface;

class GiftCardRepository implements GiftCardRepositoryInterface
{
    public function createGiftCard(GiftCardRequest $request ) 
    {
        $giftCard = GiftCard::create($request->all($request));
        return $giftCard;
    }
}