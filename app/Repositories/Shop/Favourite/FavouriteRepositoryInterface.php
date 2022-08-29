<?php

namespace App\Repositories\Shop\Favourite;

use App\Http\Requests\Favourite\FavouriteCreateRequest;
use App\Models\Shop\Favourite;
use Illuminate\Http\Request;

interface FavouriteRepositoryInterface
{
    public function addToFavouriteForm(FavouriteCreateRequest $request);
    public function deleteFromFavourite(Favourite $favourite):void;
}
