<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\Shop\Account\AccountRepositoryInterface;

class AccountController extends BaseController
{
    /**
     * @var AccountRepositoryInterface
     */
    private  AccountRepositoryInterface $accountRepository;

    /**
     * @param AccountRepositoryInterface $accountRepository
     */
    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $response =  $this->accountRepository->getAccountData();
        return $this->successResponse($response, 'get Account Data');
    }
}
