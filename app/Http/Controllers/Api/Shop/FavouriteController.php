<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Favourite\FavouriteCreateRequest;
use App\Models\Shop\Favourite;
use App\Repositories\Shop\Favourite\FavouriteRepositoryInterface;

class FavouriteController extends  BaseController
{
    /**
     * @var FavouriteRepositoryInterface
     */
    private FavouriteRepositoryInterface $favouriteRepository;

    /**
     * @param FavouriteRepositoryInterface $favouriteRepository
     */
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
        return $this->createResponse($response->toArray(), 'Add item to favourite');
    }

    /**
     * @param Favourite $favourite
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Favourite $favourite)
    {
        $this->favouriteRepository->deleteFromFavourite($favourite);
        return $this->emptyResponse('Delete item from favourite');
    }
}
