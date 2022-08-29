<?php

namespace App\Repositories\Shop\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;

/**
 *
 */
interface AuthRepositoryInterface
{
    /**
     * @param AuthRequest $request
     * @return mixed
     */
    public function registerUser(AuthRequest $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function loginUser(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateUser(Request $request);

    /**
     * @return mixed
     */
    public function logoutUser();

    /**
     * @return mixed
     */
    public function showUser();
}
