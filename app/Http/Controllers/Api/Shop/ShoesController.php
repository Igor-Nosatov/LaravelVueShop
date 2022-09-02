<?php

namespace App\Http\Controllers\Api\Shop;

use Illuminate\Http\Request;
use App\Repositories\Shop\Shoes\ShoesRepositoryInterface;
use App\Http\Controllers\Api\BaseController;
use App\Models\Shop\Shoes;

class ShoesController  extends BaseController
{
    /**
     * @var ShoesRepositoryInterface
     */
    private ShoesRepositoryInterface $shoesRepository;

    /**
     * @param ShoesRepositoryInterface $shoesRepository
     */
    public function __construct(ShoesRepositoryInterface $shoesRepository)
    {
        $this->shoesRepository = $shoesRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = $this->shoesRepository->getShoesData();
        return $this->successPaginationResponse($response['meta'],$response['data'], 'Get data for Shop page');
    }

    public function show(Shoes $shoes)
    {
        $response = $this->shoesRepository-> getShoesSingleData($shoes);
        return  $response;  //$this->successResponse($response, 'Get data for Snickers Single Page');
    }

}
