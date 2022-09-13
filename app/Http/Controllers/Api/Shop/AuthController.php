<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\Shop\Auth\AuthRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;

class AuthController  extends BaseController
{
    /**
     * @var AuthRepositoryInterface
     */
    private  AuthRepositoryInterface $authRepository;

    /**
     * @param AuthRepositoryInterface $authRepository
     */
    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function register(AuthRequest $request)
    {
        $response = $this->authRepository->registerUser($request);
        return $this->createResponse($response, 'User Register');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $response = $this->authRepository->loginUser($request);
        return $this->successResponse($response, 'User Login');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $response = $this->authRepository->updateUser($request);
        return $this->successResponse($response, 'User Update');
    }

    /**
     * @return JsonResponse
     */
    public function show()
    {
        $response = $this->authRepository->showUser();
        return $this->successResponse($response, 'User Show');
    }

    /**
     * @return JsonResponse
     */
    public function logout()
    {
        $this->authRepository->logoutUser();
        return $this->emptyResponse('User logout');
    }
}
