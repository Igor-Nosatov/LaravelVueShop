<?php

namespace App\Repositories\Shop\Favourite;

use App\Http\Requests\Favourite\FavouriteCreateRequest;
use App\Models\Shop\Favourite;
use Illuminate\Http\Request;

interface FavouriteRepositoryInterface
{
    /**
     * @param FavouriteCreateRequest $request
     * @return mixed
     */
    public function addToFavouriteForm(FavouriteCreateRequest $request);

    /**
     * @param Favourite $favourite
     * @return void
     */
    public function deleteFromFavourite(Favourite $favourite):void;
    public function getFavouriteDataAccount():array ;
    public function getFavouriteCount();
}
