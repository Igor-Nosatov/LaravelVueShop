<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Shop\Shoes\ShoesRepositoryInterface;
use App\Http\Controllers\Api\BaseController;
class ShoesController  extends BaseController
{
    private ShoesRepositoryInterface $shoesRepository;

    public function __construct(ShoesRepositoryInterface $shoesRepository)
    {
        $this->shoesRepository = $shoesRepository;
    }
    public function index()
    {
        $response = $this->shoesRepository->getShoesData();
        return $this->successPaginationResponse($response['meta'],$response['data'], 'Get data for Shop page');
    }

}
