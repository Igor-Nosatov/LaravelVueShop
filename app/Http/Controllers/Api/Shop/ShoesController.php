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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $response = $this->shoesRepository->getShoesData($request);
        return $this->successPaginationResponse($response['meta'],$response['data'], 'Get data for Shop page');
    }

    /**
     * @param Shoes $shoes
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Shoes $shoes)
    {
        $response = $this->shoesRepository-> getShoesSingleData($shoes);
        return  $this->successResponse($response, 'Get data for Snickers Single Page');
    }
}
