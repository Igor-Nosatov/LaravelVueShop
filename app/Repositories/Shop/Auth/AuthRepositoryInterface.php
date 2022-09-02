<?php

namespace App\Repositories\Shop\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\LoginRequest;

interface AuthRepositoryInterface
{
    /**
     * @param AuthRequest $request
     * @return mixed
     */
    public function registerUser(AuthRequest $request): mixed;

    /**
     * @param Request $request
     * @return mixed
     */
    public function loginUser(LoginRequest $request): mixed;

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateUser(Request $request): mixed;

    /**
     * @return mixed
     */
    public function logoutUser(): mixed;

    /**
     * @return mixed
     */
    public function showUser(): mixed;
}
