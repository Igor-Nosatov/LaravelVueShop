<?php

namespace App\Http\Controllers;

use App\Repositories\Shop\Account\AccountRepositoryInterface;
use Illuminate\Http\Request;

class AccountController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response =  $this->accountRepository->getAccountData();
        return $this->successResponse($response, 'get Account Data');
    }
}
