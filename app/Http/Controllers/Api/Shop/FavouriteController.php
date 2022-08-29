<?php

namespace App\Http\Controllers;

use App\Http\Requests\Favourite\FavouriteCreateRequest;
use App\Repositories\Shop\Favourite\FavouriteRepositoryInterface;

class FavouriteController extends Controller
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
        $response = $this->authRepository->loginUser($request);
        return $this->createResponse($response, 'Add item to favourite');
    }
}
