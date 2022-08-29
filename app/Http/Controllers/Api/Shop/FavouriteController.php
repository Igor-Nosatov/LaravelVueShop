<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Favourite\FavouriteCreateRequest;
use App\Models\Shop\Favourite;
use App\Repositories\Shop\Favourite\FavouriteRepositoryInterface;

class FavouriteController extends  BaseController
{
    private FavouriteRepositoryInterface $favouriteRepository;

    public function __construct(FavouriteRepositoryInterface $favouriteRepository)
    {
        $this->favouriteRepository = $favouriteRepository;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FavouriteCreateRequest $request)
    {
        $response = $this->favouriteRepository->addToFavouriteForm($request);
        return $this->createResponse($response, 'Add item to favourite');
    }

    public function delete(Favourite $favourite)
    {
        $this->favouriteRepository->deleteFromFavourite($favourite);
        return $this->emptyResponse('Delete item from favourite');
    }
}
