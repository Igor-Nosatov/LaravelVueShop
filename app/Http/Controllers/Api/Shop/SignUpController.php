<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\SignUp\SignUpRequest;
use App\Repositories\Shop\SignUp\SignUpRepositoryInterface;

class SignUpController extends BaseController
{
    /**
     * @var  SignUpRepositoryInterface
     */
    private  SignUpRepositoryInterface $signUpRepository;

    /**
     * @param  SignUpRepositoryInterface $signUpRepository
     */
    public function __construct(SignUpRepositoryInterface $signUpRepository)
    {
        $this->signUpRepository = $signUpRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignUpRequest $request)
    {
        $response = $this->signUpRepository->signUpUser($request);
        return $this->createResponse($response->toArray(), 'Add  SignUp Data');
    }
}
