<?php

namespace App\Repositories\Shop\GiftCard;

use App\Http\Requests\GiftCard\GiftCardRequest;
use Illuminate\Http\Request;

interface GiftCardRepositoryInterface
{

    public function createGiftCard(GiftCardRequest $request );

}
