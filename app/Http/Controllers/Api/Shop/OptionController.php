<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\Shop\Option\OptionRepositoryInterface;
class OptionController extends BaseController
{
    /**
     * @var OptionRepositoryInterface
     */
    private OptionRepositoryInterface $optionRepository;

    /**
     * @param OptionRepositoryInterface $optionRepository
     */
    public function __construct(OptionRepositoryInterface $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }

    /**
     * @return array
     */
    public function index()
    {
        $response = $this->optionRepository->getOptions();
        return  $this->successResponse($response, 'Get filter options for Shop page');
    }
}
