<?php

namespace App\Repositories\Shop\Favourite;

use App\Http\Requests\Favourite\FavouriteCreateRequest;
use App\Models\Shop\Favourite;
use Illuminate\Http\Request;

class FavouriteRepository implements FavouriteRepositoryInterface
{
    public function addToFavouriteForm(FavouriteCreateRequest $request)
    {
        $favourites = Favourite::create($request->all());
        return $favourites;
    }
} 