<?php

namespace App\Repositories\Shop\Favourite;

use App\Http\Requests\Favourite\FavouriteCreateRequest;
use App\Models\Shop\Favourite;
use Illuminate\Http\Request;

/**
 *
 */
class FavouriteRepository implements FavouriteRepositoryInterface
{
    /**
     * @param FavouriteCreateRequest $request
     * @return mixed
     */
    public function addToFavouriteForm(FavouriteCreateRequest $request)
    {
        return Favourite::create($request->all());
    }

    /**
     * @param Favourite $favourite
     * @return void
     */
    public function deleteFromFavourite(Favourite $favourite):void
    {
       $favourite->delete();
    }
}
