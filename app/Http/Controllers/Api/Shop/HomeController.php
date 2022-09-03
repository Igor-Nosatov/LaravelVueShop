<?php

namespace App\Http\Controllers\Api\Shop;

use App\Repositories\Shop\Home\HomeRepositoryInterface;
use App\Http\Controllers\Api\BaseController;

class HomeController extends BaseController
{
    /**
     * @var HomeRepositoryInterface
     */
    private HomeRepositoryInterface $homeRepository;

    /**
     * @param HomeRepositoryInterface $homeRepository
     */
    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = $this->homeRepository->getShoesDataForHomePage();
        return $this->successResponse($response, 'Get data for Home page');
    }
}
