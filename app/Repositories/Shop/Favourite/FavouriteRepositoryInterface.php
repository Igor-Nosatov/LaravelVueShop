<?php

namespace App\Repositories\Shop\Favourite;

use App\Http\Requests\Favourite\FavouriteCreateRequest;
use Illuminate\Http\Request;

interface FavouriteRepositoryInterface
{
    public function addToFavouriteForm(FavouriteCreateRequest $request);
}
