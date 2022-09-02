<?php

namespace App\Repositories\Shop\GiftCard;

use App\Http\Requests\GiftCard\GiftCardRequest;

interface GiftCardRepositoryInterface
{
    /**
     * @param GiftCardRequest $request
     * @return mixed
     */
    public function createGiftCard(GiftCardRequest $request);
}
