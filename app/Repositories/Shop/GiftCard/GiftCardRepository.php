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
    public function createGiftCard(GiftCardRequest $request )
    {
      // GiftCard::create($request->all($request->toArray()));
      $shark = new GiftCard;
       $shark->name  = $request->name;
       $shark->email  = $request->email;
       $shark->recipient_name  = $request->recipient_name;
       $shark->recipient_email  = $request->recipient_email;
       $shark->message  = $request->message;
       $shark->amount  = $request->amount;
       $shark->user_id  = $request->user_id;
       $shark->save();
       return $shark;
    }
}

