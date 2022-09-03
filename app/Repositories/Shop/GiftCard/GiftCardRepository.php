<?php

namespace App\Repositories\Shop\GiftCard;

use App\Http\Requests\GiftCard\GiftCardRequest;
use App\Models\Shop\GiftCard;
use App\Repositories\Shop\GiftCard\GiftCardRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class GiftCardRepository implements GiftCardRepositoryInterface
{
  /**
   * @param GiftCardRequest $request
   */
  public function createGiftCard(GiftCardRequest $request)
  {
    $giftCard = GiftCard::create($request->all());
    return  $giftCard;
  }
}
