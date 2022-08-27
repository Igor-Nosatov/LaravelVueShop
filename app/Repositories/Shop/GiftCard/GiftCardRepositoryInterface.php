<?php

namespace App\Repositories\Shop\GiftCard;
use Illuminate\Http\Request;

interface GiftCardRepositoryInterface
{
    public function getAllGiftCard();

    public function getGiftCardById($id);

    public function createOrUpdateGiftCard( $id = null, $collection = [] );

    public function deleteGiftCard($id);
}
