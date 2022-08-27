<?php

namespace App\Http\Controllers\Api\Shop;

use App\Repositories\Shop\Home\HomeRepositoryInterface;
use App\Http\Controllers\Api\BaseController;
class HomeController extends BaseController
{
    private HomeRepositoryInterface $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function index()
    {
        $response = $this->homeRepository->getShoesDataForHomePage();
        return $this->successResponse($response, 'Get data for Home page');
    }
}
