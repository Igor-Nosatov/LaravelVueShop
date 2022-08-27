<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Shop\Option\OptionRepositoryInterface;
class OptionController extends Controller
{
    private OptionRepositoryInterface $optionRepository;

    public function __construct(OptionRepositoryInterface $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }
    public function index()
    {
        $response = $this->optionRepository->getOptions();
        return  $response;//$this->successResponse($response, 'Get filter options for Shop page');
    }
}
