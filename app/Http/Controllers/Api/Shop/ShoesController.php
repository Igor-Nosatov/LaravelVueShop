<?php

namespace App\Http\Controllers\Api\Shop;

use Illuminate\Http\Request;
use App\Repositories\Shop\Shoes\ShoesRepositoryInterface;
use App\Http\Controllers\Api\BaseController;

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
     * @return JsonResponse
     */
    public function index():JsonResponse
    {
        $response = $this->shoesRepository->getShoesData();
        return $this->successPaginationResponse($response['meta'],$response['data'], 'Get data for Shop page');
    }

}
